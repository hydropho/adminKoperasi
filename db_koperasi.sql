-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 10:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `no_pinjaman` varchar(7) NOT NULL DEFAULT '',
  `tgl_bukti` date NOT NULL,
  `bayar` int(10) NOT NULL,
  `sisa` int(10) NOT NULL,
  `denda` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `no_pinjaman` varchar(7) DEFAULT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `pinjaman_pokok` int(10) NOT NULL,
  `bunga` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `angsuran` int(10) NOT NULL,
  `keterangan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 1,
  `aktif` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_lengkap`, `level`, `aktif`) VALUES
('admin', '$2y$10$Dv.ntxdlWFkwI3rANQ.JX.c25wtCAtCRNp8VfQsAyHHyVfq.cHfFK', 'Aswin Khairu Adnan', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `profil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`username`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `profil`) VALUES
('admin', 'Aswin Khairu Adnan', 'Bogor', '2004-05-16', 'Laki - Laki', 'JL. BENGKALIS NO.411 RT.11/07CILUAR', '083147797580', 'default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
