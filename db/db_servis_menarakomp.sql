-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2021 at 03:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_servis_menarakomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin1', 'admin1'),
(2, 'admin2', 'admin2'),
(3, 'admin3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_sparepart`
--

CREATE TABLE `tb_barang_sparepart` (
  `id` int(11) NOT NULL,
  `idservis` char(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang_sparepart`
--

INSERT INTO `tb_barang_sparepart` (`id`, `idservis`, `idbarang`, `harga`) VALUES
(2, 'S2020073001', 1, 3000),
(3, 'S2020073031', 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_panggilan`
--

CREATE TABLE `tb_panggilan` (
  `idpanggilan` int(11) NOT NULL,
  `idpelanggan` int(11) DEFAULT NULL,
  `idteknisi` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `namabarang` varchar(100) DEFAULT NULL,
  `deskripsikerusakan` text DEFAULT NULL,
  `status` varchar(100) DEFAULT 'daftar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_panggilan`
--

INSERT INTO `tb_panggilan` (`idpanggilan`, `idpelanggan`, `idteknisi`, `tanggal`, `jam`, `namabarang`, `deskripsikerusakan`, `status`) VALUES
(1, 1, 1, '2021-04-29', '12:00:00', 'Laptop', 'Laptop tidak mau boot', 'proses'),
(2, 2, 2, '2021-04-29', '12:00:00', 'Komputer', 'Tidak mau menyala', 'proses'),
(3, 12, 6, '2021-05-19', '09:35:00', 'Laptop', 'mati', 'Proses'),
(4, 13, NULL, '2021-06-08', '10:00:00', 'Laptop Mati', 'Laptop Saya mati.', 'daftar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namapelanggan`, `alamat`, `nohp`, `email`, `password`) VALUES
(1, 'Huda Dwika', 'Jln. Gayam No.2 Yogyakarta', '089111222333', 'huda@email.com', 'huda'),
(2, 'Anggita Proboningrum', 'Jln. Selomerto No.1', '085555666777', 'anggita@gmail.com', 'anggita'),
(3, 'Siti Khoiriyah', 'Jln. Merah Putih No. 1 Yogyakarta', '085667455667', 'siti@gmail.com', 'siti'),
(4, 'Reni Saputri', 'Jln. Gayam No.3 Yogyakarta', '081665224778', 'reni@gmail.com', 'reni'),
(5, 'Nanda Rifki', 'Jln. Tentara Pelajar No.6 Yogyakarta', '085647668811', 'nanda@gmail.com', 'nanda'),
(7, 'Afan Nur ', 'Jln. Merah Putih No. 7 Yogyakarta', '085445667112', 'afan@gmail.com', 'afan'),
(8, 'Agung Dwi', 'Jln. Gayam No.3 Yogyakarta', '085645778123', 'agung@gmail.com', 'agung'),
(9, 'Taufik Hidayat', 'Jln. Brayut No.1 Yogyakarta', '081567778235', 'taufik@gmail.com', 'taufik'),
(10, 'Wisnu Almadudin', 'Jln. Gayam No.13 Yogyakarta', '085667456123', 'wisnu@gmail.com', 'wisnu'),
(11, 'Yusuf Baihaqi', 'Jln. Gayam No.9 Yogyakarta', '085647665123', 'yusuf@gmail.com', 'yusuf'),
(12, 'nama', 'Sleman', '08181', 'nama@email.com', 'password'),
(13, 'hadi', 'Sleman, Jogja', '0819191910', 'hadi@email.com', 'hasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengerjaan`
--

CREATE TABLE `tb_pengerjaan` (
  `idpengerjaan` int(11) NOT NULL,
  `idservis` char(11) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `presentase` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengerjaan`
--

INSERT INTO `tb_pengerjaan` (`idpengerjaan`, `idservis`, `pekerjaan`, `tanggal`, `presentase`) VALUES
(1, '', 'Perbaiki Laptop', '2021-06-08', 50),
(3, 'S2020073001', 'Selesai', '2021-06-08', 100),
(4, 'S2020073031', 'Selesai', '2021-06-08', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_servis`
--

CREATE TABLE `tb_servis` (
  `idservis` char(11) NOT NULL,
  `idpelanggan` char(8) DEFAULT NULL,
  `tanggalmasuk` date DEFAULT NULL,
  `tgldiambil` date DEFAULT NULL,
  `kerusakan` varchar(500) DEFAULT NULL,
  `keteranganbarang` text DEFAULT NULL,
  `biayaservis` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `idteknisi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_servis`
--

INSERT INTO `tb_servis` (`idservis`, `idpelanggan`, `tanggalmasuk`, `tgldiambil`, `kerusakan`, `keteranganbarang`, `biayaservis`, `total`, `status`, `idteknisi`) VALUES
('S2020073001', '1', '2021-04-29', NULL, 'Tidak menyala', 'mati', 10000, 13000, 'selesai', 1),
('S2020073031', '1', '2021-04-29', NULL, 'Keyboard mati', 'mati', 7000, 10000, 'selesai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sparepart`
--

CREATE TABLE `tb_sparepart` (
  `idsparepart` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `tipe` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sparepart`
--

INSERT INTO `tb_sparepart` (`idsparepart`, `nama`, `harga`, `merk`, `tipe`) VALUES
(1, 'Baut 1mm ubah', 3000, 'Nama Merk1', 'Nama Tipe1'),
(2, 'LCD 14\\\"', 1200000, 'Nama Merk', 'Nama Tipe'),
(3, 'Ram 4 Gb', 400000, 'Nama Merk', 'Nama Tipe'),
(4, 'Keyboard', 80000, 'Nama Merk', 'Nama Tipe'),
(5, 'VGA Card', 1500000, 'Nama Merk', 'Nama Tipe'),
(6, 'Hardisk 500 Gb', 500000, 'Nama Merk', 'Nama Tipe'),
(7, 'Motherboard', 300000, 'Nama Merk', 'Nama Tipe'),
(8, 'Processor', 500000, 'Nama Merk', 'Nama Tipe'),
(9, 'Power Supply', 200000, 'Nama Merk', 'Nama Tipe'),
(10, 'Baterai Laptop', 300000, 'Nama Merk', 'Nama Tipe');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teknisi`
--

CREATE TABLE `tb_teknisi` (
  `idteknisi` int(11) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_teknisi`
--

INSERT INTO `tb_teknisi` (`idteknisi`, `nama`, `nohp`, `alamat`, `username`, `password`) VALUES
(1, 'Arif Santoso', '081222333444', 'Jln. Merah Putih No. 2 Yogyakarta', 'arif', 'arif'),
(2, 'Bayu Kurniawan', '082333444555', 'Jln. Tentara Pelajar No.4 Yogyakarta', 'bayu', 'bayu'),
(3, 'Karman Pangestu', '083444555666', 'Jln. Semua Sama No.1 Yogyakarta', 'karman', 'karman'),
(4, 'Wahyu Widadi', '085666777888', 'Jln. Merah Putih No.1 Yogyakarta', 'wahyu', 'wahyu'),
(5, 'Andy Setiawan', '086777888999', 'Jln. Semua Sama No.6 Yogyakarta', 'andy', 'andy'),
(6, 'Johan Lukmana', '087888999000', 'Jln. Semua Sama No.2 Yogyakarta', 'johan', 'johan'),
(7, 'Ahmad Aris', '089111444555', 'Jln. Tentara Pelajar No.2 Yogyakarta', 'ahmad', 'ahmad'),
(8, 'Adit Aditya', '085666444222', 'Jln. Pahlawan No.1 Yogyakarta', 'adit', 'adit'),
(9, 'Hafid Setyono', '087666222111', 'Jln. Gayam No.1 Yogyakarta', 'hafid', 'hafid'),
(10, 'Anggit Saputra', '082333111666', 'Jln. Parakancanggah No.1 Yogyakarta', 'anggit', 'anggit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `tb_barang_sparepart`
--
ALTER TABLE `tb_barang_sparepart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_panggilan`
--
ALTER TABLE `tb_panggilan`
  ADD PRIMARY KEY (`idpanggilan`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tb_pengerjaan`
--
ALTER TABLE `tb_pengerjaan`
  ADD PRIMARY KEY (`idpengerjaan`);

--
-- Indexes for table `tb_servis`
--
ALTER TABLE `tb_servis`
  ADD PRIMARY KEY (`idservis`);

--
-- Indexes for table `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  ADD PRIMARY KEY (`idsparepart`);

--
-- Indexes for table `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  ADD PRIMARY KEY (`idteknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_barang_sparepart`
--
ALTER TABLE `tb_barang_sparepart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_panggilan`
--
ALTER TABLE `tb_panggilan`
  MODIFY `idpanggilan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pengerjaan`
--
ALTER TABLE `tb_pengerjaan`
  MODIFY `idpengerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sparepart`
--
ALTER TABLE `tb_sparepart`
  MODIFY `idsparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_teknisi`
--
ALTER TABLE `tb_teknisi`
  MODIFY `idteknisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
