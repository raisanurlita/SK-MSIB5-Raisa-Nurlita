-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 05:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokonovel`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`) VALUES
(1, 'Teen Fiction'),
(2, 'Historical Fiction'),
(3, 'Romance'),
(4, 'Comedy');

-- --------------------------------------------------------

--
-- Table structure for table `novel`
--

CREATE TABLE `novel` (
  `id_novel` int(11) NOT NULL,
  `judul_novel` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_genre` int(11) DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` decimal(11,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `novel`
--

INSERT INTO `novel` (`id_novel`, `judul_novel`, `gambar`, `penulis`, `id_penerbit`, `id_genre`, `tahun_terbit`, `stok`, `harga`) VALUES
(1, 'Hold in Hurts ', 'images/holdinhurts.png', 'Noveni Adelia', 5, 1, 2020, 22, '89000'),
(2, 'Risol Mas Marvel', 'images/risolmasmarvel.png', 'Anita Firdaus', 5, 4, 2023, 55, '89000'),
(3, 'Hilmy Milan', 'images/hilmymilan.png', 'Nadia Ristivani', 1, 1, 2022, 31, '90000'),
(4, 'Malioboro Midnight', 'images/malioboro.png', 'skysphire', 1, 1, 2023, 30, '99000'),
(5, 'Lofarsa', 'images/lofarsa.png', 'Rofenaa', 4, 3, 2022, 40, '87000'),
(6, 'Santri Pilihan Bunda', 'images/santripilihanbunda.png', 'Salsyabila Falensia', 4, 3, 2021, 12, '78000'),
(7, 'Septihan', 'images/septihan.png', 'Poppi Pertiwi', 2, 1, 2020, 21, '80000'),
(8, 'silhoute', 'images/silhoutte.png', 'Virda A. Putri', 2, 1, 2020, 10, '88000'),
(9, 'December With You', 'images/decemberwithyou.png', 'Tresia', 2, 3, 2021, 11, '79000');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(255) DEFAULT NULL,
  `alamat_penerbit` varchar(255) DEFAULT NULL,
  `telepon_penerbit` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `alamat_penerbit`, `telepon_penerbit`) VALUES
(1, 'Bukune ', 'Jl. H. Montong No.58 Ciganjur-Jagakarsa Jakarta Selatan', '02180907887'),
(2, 'Coconut Books', 'Jl. Batam Raya No. 8 Kelapa Dua Depok, Jawa Barat.', '02134236576'),
(3, 'Romancious', 'Jl. Kebagusan III, kawansan Nuansa, Kebagusan, Jakarta Selatan.', '02190091221'),
(4, 'Cloud Books Publishing', 'Jl. Adikarya, Bakti Karya, Depok, Jawa Barat.', '02167788790'),
(5, 'Akad.id', 'Komplek De Fatmawati, Blok A No. 8, Depok, Jawa Barat.', '02155654667');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `novel`
--
ALTER TABLE `novel`
  ADD PRIMARY KEY (`id_novel`),
  ADD KEY `id_genre` (`id_genre`),
  ADD KEY `id_penerbit` (`id_penerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `novel`
--
ALTER TABLE `novel`
  MODIFY `id_novel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `novel`
--
ALTER TABLE `novel`
  ADD CONSTRAINT `novel_ibfk_1` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`),
  ADD CONSTRAINT `novel_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
