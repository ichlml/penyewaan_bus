-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 03:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_201653038_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `jkel` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `jkel`, `tempat_lahir`, `tgl_lahir`, `alamat`, `user`, `pass`) VALUES
(3, 'Ilham', 'Laki-laki', 'Kudus', '2020-03-29', 'Kudus', 'as', 'as'),
(4, 'Udinn', 'Laki-laki', 'Colo', '1667-08-08', 'Colo Dawe', 'udins', 'udins');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `nama_kendaraan` varchar(35) NOT NULL,
  `jenis` enum('Micro bus','Medium bus','Big bus') NOT NULL,
  `cc` int(11) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `nopol`, `nama_kendaraan`, `jenis`, `cc`, `merk`, `keterangan`, `harga`, `foto`, `status`) VALUES
(2, 'K y7638 UI', 'Bus Mini', '', 300, 'Isuzu', 'Kursi 2x2', 400000, '1604225602_preview_small-memory-lp2.jpg', '1'),
(3, 'K 9876 BT', 'BUS BESAR', 'Big bus', 900, 'Subur Jaya', 'kursi 3x3 ', 1200000, 'aaaaaaaaaaaaa1.PNG', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `foto_bukti` text NOT NULL,
  `status_pembayaran` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_penyewaan`, `id_user`, `total_harga`, `foto_bukti`, `status_pembayaran`) VALUES
(1, 7, 1, 1200000, '1.PNG', '1'),
(2, 8, 2, 400000, 'aaaaaaaaaaaaa.PNG', '1'),
(3, 10, 1, 1200000, 'abstract-nature-1920x1080-8k-21456.jpg', '1'),
(4, 11, 2, 1200000, '53c262f01a521acb2f4e1db4dea8cbec.jpg', '1'),
(5, 13, 1, 1200000, 'Capture.PNG', '1'),
(6, 15, 2, 1200000, '11.PNG', '1'),
(7, 17, 2, 1200000, 'Capture1.PNG', '1'),
(8, 18, 2, 1200000, 'aaaaaaaaaaaaa1.PNG', '1'),
(9, 22, 2, 1200000, 'Adiba_db.PNG', '1'),
(10, 23, 2, 1200000, 'Capture2.PNG', '1'),
(11, 24, 1, 1200000, 'aaaaaaaaaaaaa2.PNG', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyewaan`
--

CREATE TABLE `tb_penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `jam` time NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `terlambat` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status_sewa` enum('pinjam','selesai','pending','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penyewaan`
--

INSERT INTO `tb_penyewaan` (`id_penyewaan`, `id_user`, `id_kendaraan`, `harga`, `tgl_sewa`, `tgl_pinjam`, `tgl_selesai`, `tujuan`, `jam`, `lama_pinjam`, `total_harga`, `tgl_kembali`, `terlambat`, `denda`, `status_sewa`) VALUES
(7, 1, 3, 1200000, '0000-00-00', '2020-05-02', '2020-05-04', '', '00:00:00', 2, 2400000, '2020-05-05', 1, 120000, 'selesai'),
(8, 2, 2, 400000, '0000-00-00', '2020-05-04', '2020-05-12', '', '00:00:00', 8, 3200000, '2020-05-12', 1, 12000, 'selesai'),
(10, 1, 3, 1200000, '0000-00-00', '2020-05-04', '2020-05-05', '', '00:00:00', 1, 1200000, '2020-05-06', 1, 120000, 'selesai'),
(11, 2, 3, 1200000, '0000-00-00', '2020-05-04', '2020-05-06', '', '00:00:00', 2, 2400000, '2020-05-06', 0, 0, 'selesai'),
(12, 2, 2, 400000, '0000-00-00', '2020-05-05', '2020-05-06', '', '00:00:00', 1, 400000, NULL, NULL, NULL, 'selesai'),
(13, 1, 3, 1200000, '0000-00-00', '2020-05-19', '2020-05-21', 'Lamongan', '05:00:00', 2, 2400000, '2020-05-21', 0, 0, 'selesai'),
(15, 2, 3, 1200000, '0000-00-00', '2020-05-23', '2020-05-25', 'Lamongan', '10:00:00', 2, 2400000, NULL, NULL, NULL, 'ditolak'),
(16, 2, 3, 1200000, '0000-00-00', '2020-05-23', '2020-05-24', 'Lamongan', '20:00:00', 1, 1200000, NULL, NULL, NULL, 'ditolak'),
(17, 2, 3, 1200000, '0000-00-00', '2020-06-11', '2020-06-13', 'kds', '12:10:00', 2, 2400000, NULL, NULL, NULL, 'ditolak'),
(18, 2, 3, 1200000, '0000-00-00', '2020-06-12', '2020-06-13', 'Lamongan', '15:08:00', 1, 1200000, '2020-06-12', 0, 0, 'selesai'),
(22, 2, 3, 1200000, '2020-06-12', '2020-06-12', '2020-06-15', 'Lamongan', '00:03:00', 3, 3600000, '2020-06-12', 0, 0, 'selesai'),
(23, 2, 3, 1200000, '2020-06-12', '2020-06-12', '2020-06-16', 'Lamongan', '01:10:00', 4, 4800000, NULL, NULL, NULL, 'pending'),
(24, 1, 3, 1200000, '2020-06-12', '2020-06-16', '2020-06-18', 'kds', '20:07:00', 2, 2400000, NULL, NULL, NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik` int(19) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `jkel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` int(13) NOT NULL,
  `alamat` text NOT NULL,
  `foto_ktp` text NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `p1` int(1) DEFAULT NULL,
  `p2` int(1) DEFAULT NULL,
  `p3` int(1) DEFAULT NULL,
  `level` enum('user','biro') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama_user`, `jkel`, `tempat_lahir`, `tgl_lahir`, `no_hp`, `alamat`, `foto_ktp`, `user`, `pass`, `p1`, `p2`, `p3`, `level`) VALUES
(1, 0, 'bambang', 'Laki-laki', 'Kudus', '2020-04-07', 98, 'Undaan Lor, Undaan, Kudus', '', 'bamb', 'bamb', 1, 1, 1, 'user'),
(2, 0, 'Udin Sujale', 'Laki-laki', 'Dawe', '2020-04-16', 766, 'Colo, Dawe, Kudus', '', 'udin', 'udin', 1, 1, 1, 'user'),
(3, 0, 'Adi', 'Laki-laki', 'Jepara', '1999-02-09', 7555, 'Mayong, Jepara', '', 'adi', 'adi', 1, 1, 1, 'user'),
(4, 0, 'Rudi', 'Laki-laki', 'Kudus', '1779-08-08', 777, 'Jati, Kudus', '', 'rudi', 'rudi', 1, 1, 1, 'user'),
(5, 0, 'pur', 'Laki-laki', 'Gamong', '1997-08-08', 777777, 'Gamong Pati', '', 'pur', 'pur', 1, 1, 1, 'user'),
(6, 0, 'Amal', 'Laki-laki', 'Kudus', '1999-08-08', 8653463, 'undaan', '', 'ax', 'ax', 1, 1, 1, 'user'),
(7, 0, 'Nusantara', 'Laki-laki', '', '0000-00-00', 987365746, 'Jati Kulon', '', 'nt', 'nt', 1, 1, 1, 'biro'),
(9, 234, 'awq', 'Laki-laki', 'kudys', '1997-08-09', 1212, 'asas', 'aaaaaaaaaaaaa1.PNG', 'yu', 'yu', 1, 1, 1, 'user'),
(10, 123, 'asdssss', 'Laki-laki', 'asd', '2020-05-04', 123432, 'asw', 'contoh-1.png', '12', '12', 1, 1, NULL, 'user'),
(11, 2344, 'Saske', 'Laki-laki', 'as', '2020-05-10', 2323, 'asdw', 'aaaaaaaaaaaaa1.PNG', 'qw', 'qw', NULL, 1, NULL, 'user'),
(12, 0, 'Hariyono', NULL, NULL, NULL, 986677, 'Undaaan', '', 'asw', 'asw', 1, 1, 1, 'biro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_penyewaan` (`id_penyewaan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `tb_penyewaan` (`id_penyewaan`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_penyewaan`
--
ALTER TABLE `tb_penyewaan`
  ADD CONSTRAINT `tb_penyewaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_penyewaan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `tb_kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
