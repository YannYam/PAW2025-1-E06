-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2025 at 05:07 AM
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
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT;

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
