-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 08:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `kredensial`
--

CREATE TABLE `kredensial` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` enum('ADMIN','USER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kredensial`
--

INSERT INTO `kredensial` (`id_user`, `username`, `password`, `status`) VALUES
(5, 'admin', '$2y$10$rSsiWk7PHl3rwjo6sEVjPeVigKdrgW1fTfYVa5dFsPZJMQVnNutVy', 'ADMIN'),
(6, 'user', '$2y$10$28m513M8Dy98aEz2ZESA2.BL/hfqGkU5bK4wMCq5IVs/02xv8ZSdm', 'USER'),
(7, 'dino', '$2y$10$jspDgr65IkZCxPLDS7jxBe24s.vhjABO2JbwMYedg86bElnq47Y3i', 'USER'),
(8, 'ujang', '$2y$10$ADS7Z7KExoVg5S6gOASZg.Dz2xjK0UEMZffjRqbvFvkJb5oN8qEny', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(13) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `id_wali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama`, `jurusan`, `jenis_kelamin`, `alamat`, `id_wali`) VALUES
(29, '13', 'Fauzan Akbar Ramadani', 'TEKNIK KIMIA', 'P', 'Jetis, Sukoharjo', 8),
(30, '18', 'Ibnu Farij', 'TEKNIK INFORMATIKA', 'P', 'Tawangmangu', 8),
(31, '25', 'Naufal Danadyaksa', 'TEKNIK INFORMATIKA', 'L', 'Kleco', 9),
(32, '13', 'Farrel Kunudani Yudistira', 'TEKNIK INFORMATIKA', 'L', 'Paris, Sukoharjo', 13),
(33, '14', 'Dino', 'TEKNIK INFORMATIKA', 'L', 'France, Sukoharjo', 13);

-- --------------------------------------------------------

--
-- Table structure for table `wali_mahasiswa`
--

CREATE TABLE `wali_mahasiswa` (
  `id_wali` int(11) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `alamat_wali` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wali_mahasiswa`
--

INSERT INTO `wali_mahasiswa` (`id_wali`, `nama_wali`, `jenis_kelamin`, `alamat_wali`) VALUES
(8, 'Yanto bin Nanang', 'L', 'Sukoharjo'),
(9, 'Nanang', 'L', 'Kleco'),
(13, 'Yudas', 'L', 'Bogor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kredensial`
--
ALTER TABLE `kredensial`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_wali` (`id_wali`);

--
-- Indexes for table `wali_mahasiswa`
--
ALTER TABLE `wali_mahasiswa`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kredensial`
--
ALTER TABLE `kredensial`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wali_mahasiswa`
--
ALTER TABLE `wali_mahasiswa`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_wali`) REFERENCES `wali_mahasiswa` (`id_wali`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
