-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 05:32 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbberita`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblberita`
--

CREATE TABLE `tblberita` (
  `idBerita` int(10) NOT NULL,
  `idKategori` int(10) NOT NULL,
  `judulberita` char(20) NOT NULL,
  `isiberita` varchar(40) NOT NULL,
  `penulis` varchar(15) NOT NULL,
  `tgldipublish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblberita`
--

INSERT INTO `tblberita` (`idBerita`, `idKategori`, `judulberita`, `isiberita`, `penulis`, `tgldipublish`) VALUES
(0, 0, 'Pembelajaran Online', 'Pembelajaran Online Menggunakan Web elea', 'RAHUL BEGET PANDAPOTAN PURBA', '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idKategori` int(10) NOT NULL,
  `nama_kategori` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`idKategori`, `nama_kategori`) VALUES
(0, 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idKategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
