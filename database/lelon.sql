-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 01:43 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lelon`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `nama` text NOT NULL,
  `berat` text NOT NULL,
  `harga` text NOT NULL,
  `foto` text NOT NULL,
  `terpilih` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_pengguna`, `nama`, `berat`, `harga`, `foto`, `terpilih`) VALUES
(20, 12, 'Sanji', '10', '15000', 'ikan.jpg', 0),
(21, 12, 'Sanji', '15', '40000', 'cumi.png', 18),
(22, 12, 'Sanji', '20', '3000', 'kol.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `id` int(11) NOT NULL,
  `id_penjual` int(3) NOT NULL,
  `id_pembeli` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `id_penjual` int(5) NOT NULL,
  `id_pembeli` int(5) NOT NULL,
  `id_barang` int(5) NOT NULL,
  `harga` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_penjual`, `id_pembeli`, `id_barang`, `harga`) VALUES
(16, 12, 13, 22, 68300),
(17, 12, 11, 22, 69000),
(18, 12, 11, 21, 16000),
(19, 12, 11, 20, 24900),
(20, 12, 11, 20, 30000),
(21, 12, 11, 21, 14100);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `hp` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `work` text NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(35) NOT NULL,
  `foto` text NOT NULL,

  `x` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `level`, `hp`, `age`, `work`,  `alamat`, `gender`, `foto`, `x`) VALUES
(11, 'Luffy', 'luffy@shp.op', 'luffy', 'Pembeli', '+13 23214234242', 26, 'Guru', 'Lambhuk', 'Perempuan', '458-luff.jpg', 1),
(12, 'Sanji', 'sanji@shp.op', 'sanji', 'Penjual', '+09 34342342', 40, 'Pedagang', 'Pasar UleeKareng', 'Laki-laki', '200-sannn.jpg', 0),
(13, 'Nami', 'nami@shp.op', 'nami', 'Pembeli', '+234 234234 234 234', 41, 'Ibu Rumah Tangga', 'Peunayong', 'Perempuan', '373-Namm.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
