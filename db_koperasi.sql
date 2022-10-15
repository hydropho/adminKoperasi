-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 09:19 AM
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
  `jatuh_tempo` date NOT NULL,
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
  `no_pinjaman` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pinjaman_pokok` int(10) NOT NULL,
  `bunga` int(11) NOT NULL,
  `tgl_pinjaman` date DEFAULT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `tgl_selesai` date NOT NULL,
  `angsuran` int(10) NOT NULL,
  `keterangan` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no_pinjaman`, `username`, `pinjaman_pokok`, `bunga`, `tgl_pinjaman`, `jangka_waktu`, `tgl_selesai`, `angsuran`, `keterangan`) VALUES
(1001, 'admin', 1000000, 1, '2022-10-13', 12, '2023-10-13', 93333, 1),
(1002, 'ghani', 100000, 1, '2022-10-13', 3, '2023-01-13', 34333, 1),
(1003, 'ghani', 1000000, 1, '2022-10-14', 10, '2023-08-14', 110000, 2),
(1004, 'admin', 1000000, 1, '2022-10-15', 12, '2023-10-15', 93333, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `no_simpanan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `simpanan` int(11) DEFAULT NULL,
  `jenis_simpanan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`no_simpanan`, `username`, `tgl_simpanan`, `simpanan`, `jenis_simpanan`) VALUES
(1002, 'admin', '2022-10-15', 1000000, 'Simpanan Pokok');

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
('admin', '$2y$10$Dv.ntxdlWFkwI3rANQ.JX.c25wtCAtCRNp8VfQsAyHHyVfq.cHfFK', 'Aswin Khairu Adnan', 2, 1),
('ghani', '$2y$10$K0Y85mZh7bEGzPANFeBqDOQmj7b1EYn5/oZxk/QiUa2VCTJKY7JTi', 'Fatha Ghani', 1, 2),
('adam', '$2y$10$ZmADe7TS.0JK61UwHQiqeuKZxDGPdDLhWqPic1UHm/A0Qxqtd9CFy', 'adam', 1, 2),
('ipuly', '$2y$10$kPbbPOs2E10VbhdXIHEM9enXAoNoCbGjhvPzWclYzjDr7qiCiVpRe', 'Ipuly', 1, 1);

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
('admin', 'Aswin Khairu Adnan', 'Bogor', '2004-05-16', 'Laki - Laki', 'Bogor', '083147797580', 'default.jpg'),
('ghani', 'Fatha Ghani', 'Bogor', '2004-09-24', 'Laki - Laki', 'Bogor', '081212121212', 'default.jpg'),
('adam', 'adam', 'Tangerang', '2022-10-12', 'Laki - Laki', 'Tangerang', '07123123', 'default.jpg'),
('ipuly', 'Ipuly', 'Magelang', '2022-10-14', 'Laki - Laki', 'Magelang', '081232121', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 1, 1),
(4, 2, 3),
(5, 2, 4),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 1, 3),
(10, 1, 5),
(11, 1, 6),
(12, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `icon`) VALUES
(1, 'Dashboard', 'flaticon-025-dashboard'),
(2, 'User', 'flaticon-381-user-9'),
(3, 'Pinjaman', 'flaticon-381-add-3'),
(4, 'Simpanan', 'flaticon-381-add-1'),
(5, 'Simpanan', 'flaticon-381-add-1'),
(6, 'SHU', 'flaticon-045-heart'),
(7, 'Laporan', 'flaticon-072-printer'),
(8, 'Simulasi Pinjaman', 'flaticon-381-calculator-1');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`) VALUES
(1, 1, 'Dashboard', 'admin'),
(2, 2, 'Pengurus', 'pengguna'),
(3, 2, 'Anggota', 'pengguna/anggota'),
(4, 3, 'Data Pinjaman', 'pinjaman'),
(5, 3, 'Tagihan Pinjaman', 'pinjaman/tagihan'),
(6, 4, 'Data Simpanan', 'simpanan'),
(7, 7, 'Laporan', 'laporan'),
(8, 7, 'Bukti Bayar', 'laporan/bukti');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`no_pinjaman`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`no_simpanan`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `no_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
