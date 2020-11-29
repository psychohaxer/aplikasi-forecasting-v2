-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 03:38 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forecasting`
--

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` int(11) NOT NULL,
  `minggu` char(1) NOT NULL,
  `bulan` char(2) NOT NULL,
  `tahun` char(4) NOT NULL,
  `jumlah` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `minggu`, `bulan`, `tahun`, `jumlah`) VALUES
(1, '4', '8', '2015', 20),
(2, '1', '9', '2015', 25),
(3, '2', '9', '2015', 23),
(4, '3', '9', '2015', 24),
(5, '4', '9', '2015', 25),
(6, '1', '10', '2015', 26),
(7, '2', '10', '2015', 23),
(8, '3', '10', '2015', 21),
(9, '4', '10', '2015', 22),
(10, '1', '11', '2015', 30),
(11, '2', '11', '2015', 22),
(12, '3', '11', '2015', 25),
(13, '4', '11', '2015', 24),
(14, '1', '12', '2015', 27),
(15, '2', '12', '2015', 24),
(16, '3', '12', '2015', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
