-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 01:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost_23sa31a065`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `IdKamar` varchar(255) NOT NULL,
  `NamaKamar` varchar(255) DEFAULT NULL,
  `JenisKamar` enum('tipeA','tipeB') DEFAULT NULL,
  `Fasilitas` varchar(255) DEFAULT NULL,
  `HargaBulanan` int(11) DEFAULT NULL,
  `ketersediaan` enum('disewa','belum disewa') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`IdKamar`, `NamaKamar`, `JenisKamar`, `Fasilitas`, `HargaBulanan`, `ketersediaan`) VALUES
('kmr-1', 'kmr-1A', 'tipeA', 'Wifi, Kamar mandi, dapur', 800000, 'disewa'),
('kmr-2', 'kmr-2A', 'tipeA', 'wifi, kamar mandi dalam, dapur', 850000, 'disewa'),
('kmr-3', 'kmr-3A', 'tipeA', 'wifi, kamar mandi dalam, dapur', 850000, 'disewa'),
('kmr-4', 'kmr-1B', 'tipeB', 'wifi, kamar mandi luar', 600000, 'disewa'),
('kmr-5', 'kmr-2B', 'tipeB', 'wifi, kamar mandi luar', 600000, 'belum disewa'),
('kmr-6', 'kmr-4A', 'tipeA', 'wifi, kamar mandi dalam, dapur', 850000, 'disewa'),
('kmr-7', 'kmr-5A', 'tipeA', 'wifi, kamar mandi dalam, dapur', 850000, 'disewa'),
('kmr-8', 'kmr-6B', 'tipeB', 'Wifi, Kamar mandi', 600000, 'belum disewa'),
('kmr-9', 'kmr-4B', 'tipeB', 'wifi, kamar mandi luar', 600000, 'disewa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `IdPembayaran` varchar(255) NOT NULL,
  `IdPenghuni` varchar(255) DEFAULT NULL,
  `IdPengelola` varchar(255) DEFAULT NULL,
  `TanggalPembayaran` date DEFAULT NULL,
  `JumlahPembayaran` int(11) DEFAULT NULL,
  `MetodePembayaran` enum('ewallet','cash') DEFAULT NULL,
  `Catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`IdPembayaran`, `IdPenghuni`, `IdPengelola`, `TanggalPembayaran`, `JumlahPembayaran`, `MetodePembayaran`, `Catatan`) VALUES
('byr-1', 'ph-1', 'p-2', '2024-01-09', 850000, 'cash', 'Diberikan ke pak samsul'),
('byr-2', 'ph-2', 'p-2', '2024-01-04', 850000, 'ewallet', 'Diberikan ke pak samsul'),
('byr-3', 'ph-3', 'p-1', '2024-02-19', 850000, 'ewallet', 'Diberikan ke pak yono'),
('byr-4', 'ph-4', 'p-1', '2024-02-09', 600000, 'cash', 'Diberikan ke pak yono'),
('byr-5', 'ph-5', 'p-1', '2024-01-09', 850000, 'cash', 'Diberikan ke pak yono'),
('byr-6', 'ph-6', 'p-2', '2024-02-09', 850000, 'ewallet', 'Diberikan ke pak samsul'),
('byr-7', 'ph-7', 'p-1', '2024-02-02', 300000, 'cash', 'Bayar setengah dulu');

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE `pengelola` (
  `IdPengelola` varchar(255) NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Jabatan` varchar(255) DEFAULT NULL,
  `NomorTelepon` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`IdPengelola`, `Nama`, `Jabatan`, `NomorTelepon`) VALUES
('p-1', 'yono', 'Pemilik', '085123456789'),
('p-2', 'samsul', 'wakil pemilik', '085123456788'),
('p-3', 'siti', 'Pengurus', '085123456787'),
('p-4', 'surti', 'Pengurus', '085123456786'),
('p-5', 'asep', 'Satpam', '085123456785');

-- --------------------------------------------------------

--
-- Table structure for table `penghuni`
--

CREATE TABLE `penghuni` (
  `IdPenghuni` varchar(255) NOT NULL,
  `NamaPenghuni` varchar(255) DEFAULT NULL,
  `JenisKelamin` enum('pria','perempuan') DEFAULT NULL,
  `TanggalMasuk` date DEFAULT NULL,
  `IdKamar` varchar(255) DEFAULT NULL,
  `RencanaTinggal` int(11) DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penghuni`
--

INSERT INTO `penghuni` (`IdPenghuni`, `NamaPenghuni`, `JenisKelamin`, `TanggalMasuk`, `IdKamar`, `RencanaTinggal`) VALUES
('ph-1', 'Sandika', 'pria', '2024-01-10', 'kmr-4', 6),
('ph-2', 'Riska', 'perempuan', '2024-01-05', 'kmr-1', 6),
('ph-3', 'Santi', 'perempuan', '2024-02-20', 'kmr-2', 6),
('ph-4', 'Fulan', 'pria', '2024-02-10', 'kmr-3', 6),
('ph-5', 'John', 'pria', '2024-01-10', 'kmr-6', 6),
('ph-6', 'Angel', 'perempuan', '2024-02-10', 'kmr-7', 6),
('ph-7', 'Supri', 'pria', '2024-02-01', 'kmr-9', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`IdKamar`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`IdPembayaran`),
  ADD KEY `IdPenghuni` (`IdPenghuni`),
  ADD KEY `IdPengelola` (`IdPengelola`);

--
-- Indexes for table `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`IdPengelola`);

--
-- Indexes for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD PRIMARY KEY (`IdPenghuni`),
  ADD KEY `IdKamar` (`IdKamar`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`IdPenghuni`) REFERENCES `penghuni` (`IdPenghuni`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`IdPengelola`) REFERENCES `pengelola` (`IdPengelola`);

--
-- Constraints for table `penghuni`
--
ALTER TABLE `penghuni`
  ADD CONSTRAINT `penghuni_ibfk_1` FOREIGN KEY (`IdKamar`) REFERENCES `kamar` (`IdKamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
