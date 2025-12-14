-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2025 at 11:48 PM
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
-- Database: `project_uas_si31`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`) VALUES
('bara', '$2y$10$FPFNXsvOE/l4UN9/VbNP7uHJ2B2D/yflg/R5bYe.0HGtCvCZpxzV.', 'bara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `saran_masukan`
--

CREATE TABLE `saran_masukan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran_masukan`
--

INSERT INTO `saran_masukan` (`id`, `nama`, `email`, `hp`, `pesan`) VALUES
(2, 'Dwi Rahmawati', ' dwi.rahmawati@outlook.com', '0831-5678-4421', 'Tolong diberi lampu LED hemat energi di beberapa kamar, karena cahayanya kurang terang saat malam.'),
(3, 'Rama Yusuf', ' ramayusuf88@yahoo.com', '0851-7744-2098', 'Akan lebih baik jika di area dapur disediakan tempat sampah yang lebih besar supaya tidak cepat penuh.'),
(5, ' Farhan Nugraha', 'farhann03@gmail.com', '0822-7788-6654', 'Sebaiknya di setiap kamar disediakan gantungan baju tambahan agar lebih mudah menata pakaian'),
(6, 'ayu', 'ayu0023@gmail.com', '021231145661', 'saya sangat suka,kosnya nyaman,dan tenang'),
(7, 'Clara', 'clara.wj88@outlook.com', '0813-2214-9908', 'Mohon ditambahkan lampu penerangan di lorong belakang, karena pada malam hari terlihat agak gelap'),
(8, 'memei', 'memei33@gmail.com', '085733332145', 'kos nya cukup bagus,namun untuk akses jalan nya masih kurang baik tapi selebih dari semuanya sudah baik\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `status`, `isi`, `tanggal`) VALUES
(2, 'Andi', 'Mahasiswa', 'Kos ini sangat nyaman dan bersih. Lokasinya dekat kampus, jadi sangat cocok untuk mahasiswa seperti saya.', '2025-12-08 18:01:32'),
(3, 'Siti markonah', 'Karyawan', 'Fasilitasnya lengkap dan pemiliknya ramah. Harga sangat terjangkau untuk kualitas seperti ini.', '2025-12-08 18:01:32'),
(4, 'Budi', 'Mahasiswa', 'Suasana tenang dan tidak bising. Cocok untuk yang butuh tempat tinggal nyaman untuk belajar.', '2025-12-08 18:01:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `saran_masukan`
--
ALTER TABLE `saran_masukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saran_masukan`
--
ALTER TABLE `saran_masukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
