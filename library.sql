-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2025 at 06:23 PM
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
(1, 'Petualangan di Hutan', 'Cerita petualangan anak yang mengajarkan kerja sama.', 'Ayu Lestari', 'Pustaka Ceria', '2021', 7),
(2, 'Sains itu Seru!', 'Eksperimen sains sederhana dan aman untuk anak.', 'Dedi Permana', 'EduLab', '2022', 10),
(3, 'Matematika Asyik', 'Trik berhitung cepat untuk pelajar SD/SMP.', 'Yuni Hartati', 'Cendekia Muda', '2020', 6),
(4, 'Komik Sahabat Kecil', 'Komik persahabatan lucu dan mendidik.', 'Joko Susanto', 'Komik Kreatif', '2023', 12),
(5, 'Dongeng Nusantara Pilihan', 'Kumpulan dongeng dari berbagai daerah.', 'Siti Aminah', 'Penerbit Ceria', '2019', 8),
(6, 'Misteri di Perpustakaan', 'Novel misteri ringan untuk remaja.', 'Rina Dewi', 'Gramedia', '2021', 5),
(7, 'Belajar Coding Dasar', 'Pengenalan algoritma dan coding ramah anak.', 'Rahmat Hidayat', 'Tekno Nusantara', '2023', 9),
(8, 'Atlas Mini Dunia', 'Peta dan fakta negara untuk anak.', 'Bagus Wiratama', 'Nusa Pustaka', '2018', 4),
(9, 'Kisah Pahlawan Muda', 'Cerita inspiratif tokoh muda Indonesia.', 'Budi Santoso', 'Nusa Bangsa', '2022', 6),
(10, 'Komik Petualangan Sains', 'Komik edukasi sains dengan humor.', 'Andi Pratama', 'Komik Kreatif', '2020', 7);

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
(1, 1, 1, '2025-11-10', '2025-11-17', 'kembali'),
(2, 3, 2, '2025-11-12', '2025-11-19', 'pinjam'),
(3, 5, 3, '2025-11-13', '2025-11-20', 'proses'),
(4, 2, 4, '2025-11-14', '2025-11-21', 'pinjam'),
(5, 4, 5, '2025-11-15', '2025-11-22', 'terlambat'),
(6, 7, 6, '2025-11-15', '2025-11-22', 'pinjam'),
(7, 8, 7, '2025-11-16', '2025-11-23', 'pinjam'),
(8, 9, 8, '2025-11-16', '2025-11-23', 'rusak'),
(9, 10, 9, '2025-11-17', '2025-11-24', 'pinjam'),
(10, 6, 10, '2025-11-17', '2025-11-24', 'hilang');

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
(1, 'Alya Putri', 'alya_putri', '3939fee583ecde7de7c390100f190d136fb6001b2a87938cf58edc5a0a7d83fa', '081300000001', '2011-04-12', 'Jl. Teratai No.1', 'Pemustaka'),
(2, 'Rafi Pratama', 'rafi_p', 'dd5d261e81f6abcab8a32e901c85dbcba409e482cd1c98a1e803d8ffb44e7cde', '081300000002', '2010-09-03', 'Jl. Melati No.2', 'Pemustaka'),
(3, 'Nadia Salsabila', 'nadia_s', 'efaafd2c613374435551ab84f380c7e426d4beed2584c87fc9825fa86d2ac44c', '081300000003', '2009-12-25', 'Jl. Mawar No.3', 'Pemustaka'),
(4, 'Dito Kurnia', 'dito_k', '86fcb2dca4158cf259a85669f0a621a30eeff280e3e06e4c47e853e9b941b43b', '081300000004', '2008-07-18', 'Jl. Anggrek No.4', 'Pemustaka'),
(5, 'Keyla Amanda', 'keyla_a', '5c9d512c811ccef11d0709119a2614f733faafeca59971a93f19bd8de2a13a4b', '081300000005', '2012-02-10', 'Jl. Kenanga No.5', 'Pemustaka'),
(6, 'Fajar Ramadhan', 'fajar_r', 'f14bfc3957cc08992e42f28e0167ffc65bac0633c69f1aaf0d378dcacfdd9114', '081300000006', '2007-11-30', 'Jl. Cempaka No.6', 'Pemustaka'),
(7, 'Gita Ayuning', 'gita_a', 'c02ded4e1a87a53e4741c7ce40fc1d810b722a4e32c63d2fcb821795ad0b8ab1', '081300000007', '2010-01-22', 'Jl. Bougenville No.7', 'Pemustaka'),
(8, 'Hafiz Maulana', 'hafiz_m', '16b75bda73bdbff75fcde2fc39cf2be5c8b504761c760069028a1b6a434e33c8', '081300000008', '2009-05-14', 'Jl. Dahlia No.8', 'Pemustaka'),
(9, 'Intan Lestari', 'intan_l', 'f2ddc79ac9c8b93d7f9171be350246e672bd5a11f8157fa07bf804ba7d350d33', '081300000009', '2008-03-09', 'Jl. Flamboyan No.9', 'Pemustaka'),
(10, 'Jordi Saputra', 'jordi_s', '5dce0800e61ea928d3cf78e92c25c158a6fe18b241f3b12e4bff822ae917155c', '081300000010', '2007-08-27', 'Jl. Cemara No.10', 'Pemustaka'),
(11, 'Admin Perpustakaan', 'admin_perpus', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '081311112222', '1985-03-22', 'Jl. Kenari No.3', 'Administrator');

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
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `ID_PEMINJAMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
