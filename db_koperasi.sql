-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 05:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `id` int(11) NOT NULL,
  `no_pinjaman` varchar(7) NOT NULL,
  `angsuran` int(3) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `bayar` int(10) NOT NULL,
  `sisa` int(10) NOT NULL,
  `denda` int(10) DEFAULT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id`, `no_pinjaman`, `angsuran`, `jatuh_tempo`, `tgl_bayar`, `bayar`, `sisa`, `denda`, `jumlah`, `status`) VALUES
(123, '1001', 1, '2022-11-23', '0000-00-00', 93333, 1026663, 0, 93333, '2'),
(124, '1001', 2, '2022-12-23', '0000-00-00', 93333, 933330, 0, 93333, '2'),
(125, '1001', 3, '2023-01-23', '0000-00-00', 93333, 839997, 0, 93333, '2'),
(126, '1001', 4, '2023-02-23', '0000-00-00', 93333, 746664, 0, 93333, '2'),
(127, '1001', 5, '2023-03-23', '0000-00-00', 93333, 653331, 0, 93333, '2'),
(128, '1001', 6, '2023-04-23', '0000-00-00', 93333, 559998, 0, 93333, '2'),
(129, '1001', 7, '2023-05-23', '0000-00-00', 93333, 466665, 0, 93333, '2'),
(130, '1001', 8, '2023-06-23', '0000-00-00', 93333, 373332, 0, 93333, '2'),
(131, '1001', 9, '2023-07-23', '0000-00-00', 93333, 279999, 0, 93333, '2'),
(132, '1001', 10, '2023-08-23', '0000-00-00', 93333, 186666, 0, 93333, '2'),
(133, '1001', 11, '2023-09-23', '0000-00-00', 93333, 93333, 0, 93333, '2'),
(134, '1001', 12, '2023-10-23', '0000-00-00', 93333, 0, 0, 93333, '2'),
(135, '1002', 1, '2022-11-23', '0000-00-00', 186667, 2053337, 0, 186667, '1'),
(136, '1002', 2, '2022-12-23', NULL, 186667, 1866670, 0, 186667, '0'),
(137, '1002', 3, '2023-01-23', NULL, 186667, 1680003, 0, 186667, '0'),
(138, '1002', 4, '2023-02-23', NULL, 186667, 1493336, 0, 186667, '0'),
(139, '1002', 5, '2023-03-23', NULL, 186667, 1306669, 0, 186667, '0'),
(140, '1002', 6, '2023-04-23', NULL, 186667, 1120002, 0, 186667, '0'),
(141, '1002', 7, '2023-05-23', NULL, 186667, 933335, 0, 186667, '0'),
(142, '1002', 8, '2023-06-23', NULL, 186667, 746668, 0, 186667, '0'),
(143, '1002', 9, '2023-07-23', NULL, 186667, 560001, 0, 186667, '0'),
(144, '1002', 10, '2023-08-23', NULL, 186667, 373334, 0, 186667, '0'),
(145, '1002', 11, '2023-09-23', NULL, 186667, 186667, 0, 186667, '0'),
(146, '1002', 12, '2023-10-23', NULL, 186667, 0, 0, 186667, '0'),
(147, '1003', 1, '2022-11-23', NULL, 186667, 2053337, 0, 186667, '0'),
(148, '1003', 2, '2022-12-23', NULL, 186667, 1866670, 0, 186667, '0'),
(149, '1003', 3, '2023-01-23', NULL, 186667, 1680003, 0, 186667, '0'),
(150, '1003', 4, '2023-02-23', NULL, 186667, 1493336, 0, 186667, '0'),
(151, '1003', 5, '2023-03-23', NULL, 186667, 1306669, 0, 186667, '0'),
(152, '1003', 6, '2023-04-23', NULL, 186667, 1120002, 0, 186667, '0'),
(153, '1003', 7, '2023-05-23', NULL, 186667, 933335, 0, 186667, '0'),
(154, '1003', 8, '2023-06-23', NULL, 186667, 746668, 0, 186667, '0'),
(155, '1003', 9, '2023-07-23', NULL, 186667, 560001, 0, 186667, '0'),
(156, '1003', 10, '2023-08-23', NULL, 186667, 373334, 0, 186667, '0'),
(157, '1003', 11, '2023-09-23', NULL, 186667, 186667, 0, 186667, '0'),
(158, '1003', 12, '2023-10-23', NULL, 186667, 0, 0, 186667, '0');

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
  `keterangan` int(1) NOT NULL DEFAULT 1,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`no_pinjaman`, `username`, `pinjaman_pokok`, `bunga`, `tgl_pinjaman`, `jangka_waktu`, `tgl_selesai`, `angsuran`, `keterangan`, `status`) VALUES
(1001, 'admin', 1000000, 1, '2022-10-23', 12, '2023-10-23', 93333, 2, 1),
(1002, 'admin', 2000000, 1, '2022-10-23', 12, '2023-10-23', 186667, 2, 0),
(1003, 'ghani', 2000000, 1, '2022-10-23', 12, '2023-10-23', 186667, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `no_simpanan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `simpanan` int(11) DEFAULT NULL,
  `jenis_simpanan` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`no_simpanan`, `username`, `tgl_simpanan`, `simpanan`, `jenis_simpanan`, `status`) VALUES
(1001, 'ghani', '2022-10-16', 1000000, 'Simpanan Wajib', 2),
(1002, 'ghani', '2022-10-16', 2000000, 'Simpanan Sukarela', 0),
(1005, 'ardi', '2022-10-21', 1000000, 'Simpanan Wajib', 0),
(1006, 'ardi', '2022-10-21', 200000, 'Simpanan Sukarela', 2),
(1008, 'ghani', '2022-10-24', 2000000, 'Simpanan Pokok', 2);

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
('admin', '$2y$10$Dv.ntxdlWFkwI3rANQ.JX.c25wtCAtCRNp8VfQsAyHHyVfq.cHfFK', 'Aswin Khairu Adnan', 2, 2),
('ghani', '$2y$10$K0Y85mZh7bEGzPANFeBqDOQmj7b1EYn5/oZxk/QiUa2VCTJKY7JTi', 'Fatha Ghani', 1, 2),
('adam', '$2y$10$ZmADe7TS.0JK61UwHQiqeuKZxDGPdDLhWqPic1UHm/A0Qxqtd9CFy', 'adam', 1, 2),
('ipuly', '$2y$10$kPbbPOs2E10VbhdXIHEM9enXAoNoCbGjhvPzWclYzjDr7qiCiVpRe', 'Ipuly', 1, 2),
('ghanii', '$2y$10$Yv/xMu50193g6hnUIqFFyOBBOTT1ydZgOu7Qc/0JrkHb9yTE9r0lO', 'Ghani', 2, 2),
('ardi', '$2y$10$7UIqyiuPcw4EGWkC4JbJg.vX2LTudhh.CaqCa/kTiMJ3/wK8pVDqK', 'Ardi', 1, 2),
('test', '$2y$10$uKCYvHqqhZemq5GLIJVXT.giaOMUukkZnsNbSpeTSFYNAEW9pPx0W', 'test', 2, 2);

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
('admin', 'Aswin Khairu Adnani', 'Bogor', '2004-05-16', 'Laki - Laki', 'Bogor', '083147797580', '252311.png'),
('ghani', 'Fatha Ghani', 'Bogor', '2004-09-24', 'Laki - Laki', 'Bogorr', '081212121212', 'default.jpg'),
('adam', 'adam', 'Tangerang', '2022-10-12', 'Laki - Laki', 'Tangerang', '07123123', 'default.jpg'),
('ipuly', 'Ipuly', 'Magelang', '2022-10-14', 'Laki - Laki', 'Magelang', '081232121', 'default.jpg'),
('ghanii', 'Ghani', 'Bogor', '2022-10-21', 'Laki - Laki', 'Tangerang', '123', 'default.jpg'),
('ardi', 'ardi', 'tangerang', '2022-10-21', 'Laki - Laki', 'JL. BENGKALIS NO.411 RT.11/07CILUAR', '083147797580', 'default.jpg'),
('test', 'test', 'bogor', '2022-10-21', 'Laki - Laki', 'JL. BENGKALIS NO.411 RT.11/07CILUAR', '083147797580', 'default.jpg');

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
(2, 'Pengguna', 'flaticon-381-user-9'),
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
(2, 3, 'Data Pinjaman', 'pinjaman'),
(3, 3, 'Tagihan Pinjaman', 'pinjaman/tagihan'),
(4, 4, 'Data Simpanan', 'simpanan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `no_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `no_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
