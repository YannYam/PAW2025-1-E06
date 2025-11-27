-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 09:39 AM
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
  `COVER` varchar(50) DEFAULT 'default.png',
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
('Aku,-Meps,-dan-Beps-2016.jpg', 1, NULL, 'Aku, Meps, dan Beps', 'Kisah seorang anak yang melihat dinamika keluarga dari sudut pandang polos dan unik.', 'Soca Sobhita dan Reda Gaudiamo', 'Post Press', '2016'),
('Keluarga-Cemara-1-2017.jpeg', 2, NULL, 'Keluarga Cemara 1', 'Novel keluarga tentang kejujuran dan hidup sederhana dalam keterbatasan ekonomi.', 'Arswendo Atmowiloto', 'Gramedia Pustaka Utama', '2017'),
('Keluarga-Cemara-2-2017.jpeg', 3, NULL, 'Keluarga Cemara 2', 'Lanjutan kisah keluarga sederhana dengan nilai kebersamaan yang kuat.', 'Arswendo Atmowiloto', 'Gramedia Pustaka Utama', '2017'),
('Laskar-Pelangi-2005.jpg', 4, NULL, 'Laskar Pelangi', 'Kisah perjuangan pendidikan dan persahabatan anak-anak di Belitung.', 'Andrea Hirata', 'Bentang Pustaka', '2005'),
('Negeri-5-Menara-2009.jpg', 5, NULL, 'Negeri 5 Menara', 'Cerita inspiratif tentang persahabatan dan perjuangan remaja di pesantren.', 'Ahmad Fuadi', 'Gramedia Pustaka Utama', '2009'),
('Aku,-Meps,-dan-Beps-(Cetakan-Ulang)-2022.jpg', 6, NULL, 'Aku, Meps, dan Beps (Cetakan Ulang)', 'Versi cetakan ulang dari kisah keluarga yang dituturkan melalui sudut pandang anak.', 'Soca Sobhita dan Reda Gaudiamo', 'Post Press', '2022'),
('Mata-di-Tanah-Melus-2018.jpeg', 7, NULL, 'Mata di Tanah Melus', 'Novel fantasi anak yang membawa pembaca ke dunia Melus dalam petualangan seru.', 'Okky Madasari', 'Penerbit Indonesia', '2018'),
('default.png', 8, NULL, 'Mata dan Rahasia Pulau Gapi', 'Sekuel petualangan anak dengan latar pulau Gapi, penuh misteri dan fantasi.', 'Okky Madasari', 'Penerbit Indonesia', '2019'),
('default.png', 9, NULL, 'Mata dan Manusia Laut', 'Petualangan anak dalam dunia laut yang penuh budaya lokal dan fantasi.', 'Okky Madasari', 'Penerbit Indonesia', '2019'),
('default.png', 10, NULL, 'Si Otan: Petualangan di Hutan Tropis', 'Kisah edukatif tentang hewan endemik Indonesia dan petualangannya di hutan tropis.', 'Tim Si Otan', 'Kompas', '2019'),
('default.png', 11, NULL, 'Kecil-Kecil Punya Karya: Petualangan di Sekolah Ba', 'Novel anak yang memotivasi anak untuk berani, kreatif, dan percaya diri.', 'Royyana', 'Mizan', '2018'),
('default.png', 12, NULL, 'Aku Anak Hebat', 'Buku bergambar untuk membangun karakter positif dan kepercayaan diri.', 'Saraswati Putri', 'Erlangga for Kids', '2020'),
('default.png', 13, NULL, 'Naya dan Rahasia Persahabatan', 'Cerita remaja tentang arti persahabatan dan empati.', 'Dini Fitria', 'Bentang Pustaka', '2021'),
('default.png', 14, NULL, 'Komik Sains Anak: Misteri Listrik', 'Komik edukasi sains yang menjelaskan konsep listrik dengan cara menyenangkan.', 'Tim M&C', 'M&C Gramedia', '2017'),
('default.png', 15, NULL, 'Kisah 1001 Malam Anak Nusantara', 'Cerita dongeng Nusantara yang disederhanakan untuk anak-anak.', 'Retno Putri', 'Bhuana Ilmu Populer', '2019'),
('default.png', 16, NULL, 'Dunia Dino: Petualangan Bersama T-Rex', 'Buku bergambar tentang dinosaurus untuk anak usia 6-10 tahun.', 'M. Yusuf', 'Erlangga for Kids', '2022'),
('default.png', 17, NULL, 'Petualangan Anak Rimba', 'Cerita petualangan anak pedalaman Kalimantan dengan pesan cinta lingkungan.', 'Aulia Windy', 'AgroMedia', '2016'),
('default.png', 18, NULL, 'Ensiklopedia Anak Pintar: Hewan', 'Ensiklopedia hewan untuk anak dengan ilustrasi penuh warna.', 'Tim ENSI', 'Tiga Serangkai', '2018'),
('default.png', 19, NULL, 'Ensiklopedia Anak Pintar: Benda Langit', 'Penjelasan sains dasar tentang planet dan galaksi.', 'Tim ENSI', 'Tiga Serangkai', '2019'),
('default.png', 20, NULL, 'Cerita Riko: Berani Mencoba Hal Baru', 'Cerita motivasi untuk membangun keberanian.', 'Nia Anindita', 'Mizan', '2020'),
('default.png', 21, NULL, 'Aku Bisa Mengatur Waktu', 'Buku karakter anak tentang disiplin dan manajemen waktu.', 'Rika Meliana', 'Erlangga For Kids', '2021'),
('default.png', 22, NULL, 'Lala di Negeri Awan', 'Dongeng fantasi ringan dengan ilustrasi penuh warna.', 'Hana Pratiwi', 'Gramedia', '2020'),
('default.png', 23, NULL, 'Petualangan Si Kiko', 'Dari serial TV ke buku, membawa pesan kebaikan dan persahabatan.', 'Creative Team Kiko', 'M&C', '2017'),
('default.png', 24, NULL, 'Rafathar: Petualangan Anak Hebat', 'Cerita fiksi terinspirasi dari karakter Rafathar.', 'Rans Creative', 'RansBook', '2018'),
('default.png', 25, NULL, 'Didi & Friends: Petualangan di Kebun', 'Buku bergambar untuk anak pra-sekolah.', 'Digital Durian', 'Erlangga Kids', '2019'),
('default.png', 26, NULL, 'Petualangan Naura dan Genk Juara', 'Buku cerita remaja penuh nilai persahabatan.', 'Beby Chaesara', 'Mizan', '2018'),
('default.png', 27, NULL, 'Komik Pendidikan Karakter: Jujur Itu Keren', 'Komik pembentukan karakter bagi anak SD.', 'Tim Edukomik', 'Bhuana Ilmu Populer', '2020'),
('default.png', 28, NULL, 'Komik Sains: Rahasia Matahari', 'Edukasi astronomi untuk anak usia 8-12 tahun.', 'Dedi Kurniawan', 'M&C', '2017'),
('default.png', 29, NULL, 'Putri Salju dari Nusantara', 'Adaptasi dongeng klasik dengan sentuhan budaya Indonesia.', 'Ratih Paramita', 'Andi Publisher', '2016'),
('default.png', 30, NULL, 'Kumpulan Dongeng Anak Sebelum Tidur', 'Dongeng singkat untuk membaca bersama.', 'Tim StoryTime', 'Tiga Serangkai', '2019'),
('default.png', 31, NULL, 'Bintang Kecil Mencari Cahaya', 'Cerita fantasi anak yang ringan dan inspiratif.', 'Rania Putri', 'Gramedia', '2021'),
('default.png', 32, NULL, 'Diary Anak Ceria: Hari Pertamaku di SD', 'Buku diary anak dengan format cerita.', 'Intan Wedhaswary', 'Erlangga', '2018'),
('default.png', 33, NULL, 'Komik Matematika: Petualangan Angka', 'Komik belajar matematika dasar.', 'Ardi Nugraha', 'M&C', '2022'),
('default.png', 34, NULL, 'Si Bolang: Menjelajah Nusantara', 'Cerita petualangan dari program TV edukatif.', 'Trans7 Creative Team', 'AgroMedia', '2018'),
('default.png', 35, NULL, 'Ensiklopedia Hewan Laut Indonesia', 'Penjelasan tentang hewan laut khas Indonesia.', 'Tim EduSea', 'Bhuana Ilmu Populer', '2021'),
('default.png', 36, NULL, 'Anak Penjaga Hutan Mangrove', 'Cerita anak tentang menjaga ekosistem pesisir.', 'Siti Rohmah', 'Mizan', '2020'),
('default.png', 37, NULL, 'Petualangan Riri dan Burung Cendrawasih', 'Dongeng edukatif dengan setting Papua.', 'Larasati', 'Gramedia', '2017');

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
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
