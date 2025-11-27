-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 01:24 PM
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
('admin1', '0afb00138d8e73348ec1fe41fd3d3a8fcbd90156b263bfa5791ba0e095f42cfc', 'Admin Perpustakaan', '081234567890', 'Jl. Merdeka No. 1, Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `COVER` varchar(100) DEFAULT 'default.png',
  `ID_BUKU` int(11) NOT NULL,
  `ID_PEMINJAMAN` int(11) DEFAULT NULL,
  `JUDUL` varchar(64) NOT NULL,
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
('Mata-dan-Rahasia-Pulau-Gapi-2019.jpg', 8, NULL, 'Mata dan Rahasia Pulau Gapi', 'Sekuel petualangan anak dengan latar pulau Gapi, penuh misteri dan fantasi.', 'Okky Madasari', 'Penerbit Indonesia', '2019'),
('Mata-dan-Manusia-Laut-2019.jpg', 9, NULL, 'Mata dan Manusia Laut', 'Petualangan anak dalam dunia laut yang penuh budaya lokal dan fantasi.', 'Okky Madasari', 'Penerbit Indonesia', '2019'),
('Dongeng-Afrika--Kisah-Bijak-dari-Savana-dan-Hutan-2025.jpg', 10, NULL, 'Dongeng Afrika: Kisah Bijak dari Savana dan Hutan', 'Berisi kisah satwa Afrika, pahlawan suku, dan legenda nenek moyang yang penuh pelajaran hidup. Ceritanya sederhana, penuh humor khas Afrika, dan memberi sudut pandang baru tentang dunia.', 'Kak Ipang', 'Gema Buku', '2025'),
('Dongeng-Asia-Timur--Legenda-Naga-dan-Kebijaksanaan-2025.jpg', 11, NULL, 'Dongeng Asia Timur: Legenda Naga dan Kebijaksanaan', 'Menghadirkan dongeng terkenal dari Cina, Jepang, dan Korea dengan tokoh naga, samurai, roh penjaga, dan anak pemberani. Setiap cerita mengajarkan kebijaksanaan, kerja keras, dan keharmonisan.', 'Kak Ipang', 'Gema Buku', '2025'),
('Dongeng-Klasik-Eropa--Cerita-dari-Kastil-dan-Hutan-2025.jpg', 12, NULL, 'Dongeng Klasik Eropa: Cerita dari Kastil dan Hutan', 'Berisi dongeng Eropa klasik tentang putri di menara, ksatria pemberani, raksasa, dan peri hutan. Ceritanya sarat petualangan, keberanian, dan keajaiban khas dunia fantasi.', 'Kak Ipang', 'Gema Buku', '2025'),
('Dongeng-Nusantara--Kisah-Legenda-dari-Seluruh-Penjuru-Indonesia-2025.jpg', 13, NULL, 'Dongeng Nusantara: Kisah Legenda dari Seluruh Penjuru Indonesia', 'Menghadirkan legenda populer dari Jawa, Sumatra, Kalimantan, Sulawesi, hingga Papua. Penuh budaya lokal, nilai moral, serta pesan menjaga alam dan saling menghormati.', 'Kak Ipang', 'Gema Buku', '2025'),
('Dongeng-Skandinavia--Kisah-dari-Negeri-Es-2025.jpg', 14, NULL, 'Dongeng Skandinavia: Kisah dari Negeri Es', 'Cerita rakyat dari Norwegia, Swedia, dan Denmark yang menghadirkan troll, peri salju, dan pahlawan pemberani. Gaya ceritanya hangat dan penuh imajinasi tentang dunia Nordik yang misterius.', 'Kak Ipang', 'Gema Buku', '2025'),
('Hikayat-Timur-Tengah--Dongeng-1001-Malam-2025.jpg', 15, NULL, 'Hikayat Timur Tengah: Dongeng 1001 Malam', 'Terinspirasi dari Arabian Nights, menghadirkan petualangan magis seperti Aladdin, Ali Baba, dan Sinbad. Penuh suasana Timur Tengah, jin, istana megah, dan keajaiban.', 'Kak Ipang', 'Gema Buku', '2025'),
('Kisah-dari-Lautan-Pasifik--Dongeng-Pulau-ke-Pulau-2025.jpg', 16, NULL, 'Kisah dari Lautan Pasifik: Dongeng Pulau ke Pulau', 'Mengangkat cerita rakyat dari pulau-pulau Pasifik seperti Hawaii, Fiji, dan Samoa. Penuh unsur laut, dewa samudra, dan petualangan bahari khas masyarakat kepulauan.', 'Kak Ipang', 'Gema Buku', '2025'),
('Legenda-Amerika-Latin--Kisah-dari-Andes-hingga-Amazon-2025.jpg', 17, NULL, 'Legenda Amerika Latin: Kisah dari Andes hingga Amazon', 'Kisah legenda dari Peru, Brasil, Meksiko, hingga Kolombia, yang penuh unsur gunung Andes, hutan Amazon, serta budaya suku Inca dan Maya. Sarat nilai keberanian dan penghormatan alam.', 'Kak Ipang', 'Gema Buku', '2025'),
('Legenda-Dunia--Dongeng-dari-Lima-Benua-2025.jpg', 18, NULL, 'Legenda Dunia: Dongeng dari Lima Benua', 'Merangkum legenda ikonik dari Asia, Afrika, Amerika, Eropa, dan Australia. Ceritanya menggambarkan keberagaman budaya dunia serta pesan keberanian dan kebijaksanaan universal.', 'Kak Ipang', 'Gema Buku', '2025'),
('30-Cerita-Teladan-Islami-2019.jpg', 19, NULL, '30 Cerita Teladan Islami', 'Kumpulan kisah inspiratif dari sejarah Islam dan kehidupan para nabi serta sahabat. Bahasa yang sederhana memudahkan anak memahami nilai kejujuran, kesabaran, dan rasa syukur.', 'Mahmudah Mastur', 'Noktah', '2019'),
('40-Dongeng-Seru-Anak-Terpopuler-Seluruh-Dunia-2024.jpg', 20, NULL, '40 Dongeng Seru Anak Terpopuler Seluruh Dunia', 'Kumpulan 40 dongeng pilihan dari berbagai negara, mulai dari cerita Eropa, legenda Asia, hingga kisah jenaka Afrika. Ringkas, menarik, dan penuh pesan moral.', 'Kak Aini', 'Lokajaya Media', '2024'),
('Angsa-yang-Baik-Hati-(Kumpulan-Dongeng)-2025.jpg', 21, NULL, 'Angsa yang Baik Hati (Kumpulan Dongeng)', 'Cerita tentang seekor angsa yang selalu menolong siapa pun tanpa pamrih. Kisah sederhana namun menyentuh ini mengajarkan kebaikan hati, empati, dan berbagi.', 'Sri Harwati, S.Pd', 'Beta (Bikara)', '2025'),
('Dilan-1990-2014.jpg', 22, NULL, 'Dilan 1990', 'Kisah romantis antara Dilan dan Milea yang penuh humor, nostalgia, dan dialog unik berlatar Bandung tahun 1990.', 'Pidi Baiq', 'Pastel Books', '2014'),
('The-Fault-in-Our-Stars-2012.jpg', 23, NULL, 'The Fault in Our Stars', 'Romansa emosional tentang Hazel dan Augustus, dua remaja penderita kanker yang berjuang memahami cinta dan kehilangan.', 'John Green', 'Dutton Books', '2012'),
('Hujan-2016.jpg', 24, NULL, 'Hujan', 'Perpaduan drama remaja dan fiksi ilmiah tentang Lail yang menghadapi kehilangan besar di tengah bencana dunia yang menghancurkan.', 'Tere Liye', 'Gramedia Pustaka Utama', '2016'),
('Dear-Nathan-2016.jpg', 25, NULL, 'Dear Nathan', 'Kisah cinta Nathan yang nakal dan Salma yang kalem, mengajarkan tentang menerima perbedaan dan memperbaiki diri.', 'Erisca Febriani', 'Best Media', '2016'),
('To-All-the-Boys-I--039-ve-Loved-Before-2014.jpg', 26, NULL, 'To All the Boys I&#039;ve Loved Before', 'Hidup Lara Jean berubah ketika surat cinta rahasianya terkirim kepada semua mantan gebetannya, menghadirkan drama dan romansa lucu.', 'Jenny Han', 'Simon &amp; Schuster', '2014'),
('5-cm-2005.jpg', 27, NULL, '5 cm', 'Lima sahabat mendaki Gunung Semeru untuk menguji persahabatan dan mengejar mimpi, penuh motivasi dan inspirasi.', 'Donny Dhirgantoro', 'Grasindo', '2005'),
('Eleanor--amp--Park-2013.jpg', 28, NULL, 'Eleanor &amp; Park', 'Cinta dua remaja di era 1980-an yang menghadapi keluarga disfungsional, penerimaan diri, dan kasih sayang yang sederhana.', 'Rainbow Rowell', 'St. Martin&#039;s Press', '2013'),
('Marmut-Merah-Jambu-2010.jpg', 29, NULL, 'Marmut Merah Jambu', 'Kisah lucu dan pengalaman cinta pertama Raditya Dika yang ditulis dengan gaya ringan dan humor khas.', 'Raditya Dika', 'Bukune', '2010'),
('Perahu-Kertas-2009.jpg', 30, NULL, 'Perahu Kertas', 'Kugy dan Keenan berjuang menemukan cinta dan jalan hidup dengan mengikuti mimpi masing-masing.', 'Dewi Lestari', 'Bentang Pustaka', '2009'),
('Twilight-2005.jpg', 31, NULL, 'Twilight', 'Romansa antara Bella, seorang manusia, dan Edward, seorang vampir, yang penuh konflik supernatural dan emosi mendalam.', 'Stephenie Meyer', 'Little, Brown and Company', '2005'),
('The-Perks-of-Being-a-Wallflower-1999.jpg', 32, NULL, 'The Perks of Being a Wallflower', 'Perjalanan Charlie, remaja introvert, menemukan jati diri melalui persahabatan, trauma, dan pengalaman masa remaja.', 'Stephen Chbosky', 'MTV Books', '1999');

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
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `STATUS` enum('Proses','Pinjam','Kembali','Rusak','Hilang','Terlambat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('Andi Pratama', 'andi', '19513fdc9da4fb72a4a05eb66917548d3c90ff94d5419e1f2363eea89dfee1dd', '081111111111', '2010-03-15', 'Jl. Kenanga No. 1'),
('Budi Setiawan', 'budi', '1be0222750aaf3889ab95b5d593ba12e4ff1046474702d6b4779f4b527305b23', '081222222222', '2009-07-20', 'Jl. Melati No. 4'),
('Citra Dewi', 'citra', '2538f153f36161c45c3c90afaa3f9ccc5b0fa5554c7c582efe67193abb2d5202', '081333333333', '2011-09-10', 'Jl. Mawar No. 9'),
('Dimas Arya', 'dimas', 'db514f5b3285acaa1ad28290f5fefc38f2761a1f297b1d24f8129dd64638825d', '081444444444', '2008-02-22', 'Jl. Anggrek No. 2'),
('Eka Putri', 'eka', '8180d5783fea9f86479e748f6d2d1196c4a8e143643119398c16367d2c3d50f2', '081555555555', '2007-05-18', 'Jl. Dahlia No. 8'),
('Fajar Nugraha', 'fajar', '75f9793a7639faa0b83a2707d60cb21c42fe9f50992fc692390a26ac2a21b29e', '081666666666', '2009-11-01', 'Jl. Cempaka No. 7'),
('Gita Rahma', 'gita', '5bfdfaaf7e1b1244192a1ede1ea70f09f5642190821c0005669a9afbca2dee2e', '081777777777', '2010-01-25', 'Jl. Flamboyan No. 5'),
('Hadi Saputra', 'hadi', '2ced6e7160a9e2cb4be29c200852bfc4fe29d7531ff3ffc51fc1407399d8d8b8', '081888888888', '2008-09-17', 'Jl. Tulip No. 3'),
('Intan Sari', 'intan', 'b949a64fd5484e69191efb60d83f7f79195eeb2911c3eb5850af160841211f18', '081999999999', '2007-12-09', 'Jl. Teratai No. 11'),
('Joko Santoso', 'joko', 'c0a09d876279cea6c57b4453c56737fd1b0c6c95e80b0a08ac48bcc97e719afd', '082111111111', '2011-04-12', 'Jl. Nusa Indah No. 6'),
('Kiki Pramudita', 'kiki', '542cbab799aabae8c7b3cd571e6c73395515ebd86044358cc3603d8e965881e0', '082222222222', '2009-06-08', 'Jl. Duren No. 10'),
('Lala Ananda', 'lala', 'f3c16dc3ef3ba55671b0ac2938730a4afc3867cf4c01ae9a09cfe4e2367666bd', '082333333333', '2008-10-30', 'Jl. Pepaya No. 12');

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
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
