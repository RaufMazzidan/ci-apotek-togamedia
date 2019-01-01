-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 10:18 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `togamedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_cover` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `tahun`, `kode_kategori`, `harga`, `foto_cover`, `penerbit`, `penulis`, `stok`) VALUES
(6, 'Tata Cara Sholat Lengkap', '2010', 6, 50000, 'user21.png', 'Tiga Serangkai', 'Huda', 95),
(7, 'Buku Sejarah', '1990', 5, 1000, 'user-medium.png', 'Madu', 'Iswahyudi', 94),
(10, 'Ensiklopedia Islam Jilid I', '2005', 4, 500000, 'yeeyeye3.png', 'International BookStore', 'Yusouf T.', 86),
(12, 'Malin Kundang', '2010', 4, 20000, 'user31.png', 'Gramedia', 'T. Simanjuntak', 97),
(13, 'World War 2', '2012', 5, 100000, 'user51.png', 'Gramedia', 'J. Washington', 99),
(14, 'Matematika', '2018', 16, 20000, 'user22.png', 'Gramedia', 'Rauf', 99),
(15, 'Dilan 1990', '2017', 15, 180000, 'user32.png', 'Gramedia', 'Pidi Baiq', 885);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kode_detail_transaksi` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`kode_detail_transaksi`, `kode_transaksi`, `kode_buku`, `jumlah`) VALUES
(132, 95, 12, 1),
(133, 95, 7, 3),
(134, 96, 12, 5),
(135, 96, 7, 4),
(136, 97, 12, 1),
(137, 97, 7, 5),
(138, 98, 10, 1),
(139, 98, 6, 1),
(140, 98, 13, 1),
(141, 98, 7, 1),
(142, 98, 12, 1),
(143, 99, 10, 3),
(144, 99, 6, 1),
(145, 99, 13, 1),
(146, 99, 7, 1),
(147, 99, 12, 90),
(148, 100, 6, 1),
(149, 101, 7, 3),
(150, 101, 6, 1),
(151, 101, 12, 1),
(152, 101, 13, 3),
(153, 102, 12, 85),
(154, 103, 14, 2),
(155, 103, 7, 2),
(156, 103, 10, 1),
(157, 104, 14, 8),
(158, 104, 7, 13),
(159, 105, 6, 2),
(160, 105, 10, 2),
(161, 105, 12, 1),
(162, 106, 15, 10),
(163, 107, 15, 3),
(164, 107, 14, 1),
(165, 107, 13, 1),
(166, 107, 12, 2),
(167, 107, 7, 3),
(168, 107, 6, 1),
(169, 107, 10, 10),
(170, 108, 15, 2),
(171, 109, 6, 1),
(172, 110, 10, 1),
(173, 111, 7, 1),
(174, 112, 6, 1),
(175, 113, 7, 1),
(176, 114, 7, 1),
(177, 115, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
(4, 'Cerita Rakyat'),
(5, 'Sejarah'),
(6, 'Agama Islam'),
(15, 'Novel'),
(16, 'Ensiklopedia'),
(18, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_user`, `nama_pembeli`, `total`, `tanggal`) VALUES
(95, 6, 'Zidan', 21000, '2018-05-09'),
(96, 6, 'Suratman', 104000, '2018-05-09'),
(97, 6, 'Popon', 25000, '2018-05-09'),
(98, 6, 'Yaya', 671000, '2018-05-09'),
(99, 6, 'Kahar', 3451000, '2018-05-09'),
(100, 6, 'Michael', 50000, '2018-05-09'),
(101, 6, 'Rauf', 373000, '2018-05-09'),
(102, 6, 'Rauf', 1700000, '2018-05-09'),
(103, 6, 'Wasis', 542000, '2018-05-09'),
(104, 6, 'zizi', 173000, '2018-05-09'),
(105, 6, 'Kiki', 1120000, '2018-05-09'),
(106, 6, 'Gaguk', 1800000, '2018-05-09'),
(107, 6, 'Jauhari', 5753000, '2018-05-09'),
(108, 6, 'Rauf', 360000, '2018-05-09'),
(109, 6, 'Dede', 50000, '2018-05-09'),
(110, 6, 'Wasis', 500000, '2018-05-09'),
(111, 6, 'Farhan', 1000, '2018-05-09'),
(112, 6, 'Yuyun', 50000, '2018-05-09'),
(113, 6, 'Adis', 1000, '2018-05-09'),
(114, 6, 'Zidan', 1000, '2018-05-09'),
(115, 6, 'ERR', 500000, '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kode_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Rauf Mazzidan', 'rauf', 'rauf', 'admin'),
(5, 'Mazzidan', 'mazzidan', 'mazzidan', 'Mazzidan'),
(6, 'abd', 'abd', 'abd', 'kasir'),
(7, 'roup', 'roup', 'roup', 'admin'),
(8, 'hari', 'hari', 'hari', 'kasir'),
(9, 'Rauf', '123', '123', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kode_detail_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_user` (`kode_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `kode_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `user` (`kode_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
