-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 07:35 AM
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
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `COVER` varchar(50) NOT NULL,
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

INSERT INTO `buku` (`COVER`, `ID_BUKU`, `ID_PEMINJAMAN`, `JUDUL`, `DESKRIPSI`, `PENULIS`, `PENERBIT`, `TAHUN`) VALUES
('Petualangan-Si-Kancil-2018.jpg', 1, 1, 'Petualangan Si Kancil', 'Cerita rakyat untuk anak-anak.', 'R. Suryani', 'Anak Nusantara', '2018'),
('', 2, 2, 'Rahasia Hutan Ajaib', 'Novel petualangan remaja.', 'F. Widodo', 'Remaja Press', '2020'),
('', 3, 3, 'Ensiklopedia Sains Junior', 'Pengetahuan dasar sains untuk anak.', 'L. Handayani', 'EduKids', '2019'),
('', 4, 4, 'Matematika Mudah untuk Remaja', 'Belajar matematika dengan cara menyenangkan.', 'Andi Wijaya', 'SmartEdu', '2021'),
('', 5, 5, 'Dongeng Dunia', 'Kumpulan dongeng internasional.', 'N. Anita', 'Cerita Kita', '2017'),
('', 6, 6, 'Panduan Coding Anak', 'Belajar coding dasar.', 'R. Nugraha', 'TeknoKids', '2022'),
('', 7, 7, 'Komik Sains Seru', 'Belajar sains lewat komik.', 'D. Permana', 'FunComics', '2019'),
('', 8, 8, 'Petualangan Antariksa', 'Cerita fiksi ilmiah remaja.', 'S. Putra', 'Bintang Remaja', '2020'),
('', 9, 9, 'Kisah Persahabatan', 'Novel drama remaja.', 'T. Ariyanti', 'Sahabat Press', '2021'),
('', 10, 10, 'Belajar Hewan dan Tumbuhan', 'Edukasi dasar biologi anak.', 'R. Yuni', 'EduKids', '2018'),
('', 11, 11, 'Komik Matematika', 'Cara mudah mengerti matematika.', 'B. Prasetyo', 'FunComics', '2020'),
('', 12, 12, 'Detektif Cilik', 'Novel misteri untuk remaja.', 'A. Fadli', 'Remaja Ceria', '2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`),
  ADD KEY `FK_MEMILIKI2` (`ID_PEMINJAMAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`ID_PEMINJAMAN`) REFERENCES `peminjaman` (`ID_PEMINJAMAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
