-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 08:12 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preggiefix`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidan`
--

CREATE TABLE `bidan` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id` int(10) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `profesi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id`, `kode`, `profesi`) VALUES
(1, 'PR', 'Perawat'),
(2, 'BD', 'Bidan'),
(3, 'PS', 'Pasien');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `usia` int(5) NOT NULL,
  `nama_wali` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perkembangan`
--

CREATE TABLE `perkembangan` (
  `id` int(10) NOT NULL,
  `pasien_id` int(10) NOT NULL,
  `bidan_id` int(10) NOT NULL,
  `jadwal_check` date NOT NULL,
  `usia_knd` int(2) NOT NULL,
  `berat_knd` int(5) NOT NULL,
  `tensi` int(10) NOT NULL,
  `detak_jantung` int(10) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `riwayat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `grup_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidan`
--
ALTER TABLE `bidan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_id` (`pasien_id`,`bidan_id`),
  ADD KEY `bidan_id` (`bidan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `kode_id` (`grup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidan`
--
ALTER TABLE `bidan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perkembangan`
--
ALTER TABLE `perkembangan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidan`
--
ALTER TABLE `bidan`
  ADD CONSTRAINT `bidan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD CONSTRAINT `perkembangan_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`),
  ADD CONSTRAINT `perkembangan_ibfk_2` FOREIGN KEY (`bidan_id`) REFERENCES `bidan` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`grup_id`) REFERENCES `grup` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
