-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2018 at 12:51 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE IF NOT EXISTS `job_order` (
  `NOMOR_JO` varchar(8) NOT NULL,
  `NOMOR_INDUK` decimal(4,0) NOT NULL,
  `ID_PELANGGAN` varchar(10) NOT NULL,
  `TGL_KIRIM` datetime NOT NULL,
  `JENIS_PRODUK` char(12) NOT NULL,
  `TOTAL_QUANTITY` int(11) NOT NULL,
  `KETERANGAN` char(50) NOT NULL,
  PRIMARY KEY (`NOMOR_JO`),
  KEY `FK_MENANGANI` (`NOMOR_INDUK`),
  KEY `FK_MENANGANI2` (`ID_PELANGGAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `pairing`
--

CREATE TABLE IF NOT EXISTS `pairing` (
  `ID_PAIRING` varchar(10) NOT NULL,
  `ID_TRUCK` varchar(10) NOT NULL,
  `NOPOL` varchar(8) NOT NULL,
  `ID_GPS` varchar(10) NOT NULL,
  `ID_GEOFENCING` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_PAIRING`),
  KEY `FK_MEMASANG` (`ID_TRUCK`,`NOPOL`),
  KEY `FK_MEMASANG2` (`ID_GPS`,`ID_GEOFENCING`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pairing`
--


-- --------------------------------------------------------

--
-- Table structure for table `pelaksanaan`
--

CREATE TABLE IF NOT EXISTS `pelaksanaan` (
  `NOMOR_SJC` varchar(10) NOT NULL,
  `ID_SUPIR` decimal(16,0) NOT NULL,
  `ID_PRODUK` varchar(5) NOT NULL,
  `TGL_PELAKSANAAN` datetime NOT NULL,
  `JASA_TAMBAL_BAN` int(11) NOT NULL,
  `PERPANJANGAN_OPSI` int(11) NOT NULL,
  `JASA_TUNGGU` int(11) NOT NULL,
  `BIAYA_LAIN_LAIN` int(11) NOT NULL,
  `STATUS_PELAKSANAAN` int(11) NOT NULL,
  PRIMARY KEY (`NOMOR_SJC`),
  KEY `FK_MENGANGKUT` (`ID_SUPIR`),
  KEY `FK_MENGANGKUT2` (`ID_PRODUK`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelaksanaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `perencanaan`
--

CREATE TABLE IF NOT EXISTS `perencanaan` (
  `NOMOR_SJ` varchar(8) NOT NULL,
  `NOMOR_INDUK` decimal(4,0) NOT NULL,
  `ID_SUPIR` decimal(16,0) NOT NULL,
  `TGL_PERENCANAAN` datetime NOT NULL,
  `STATUS_PERENCANAAN` int(11) NOT NULL,
  PRIMARY KEY (`NOMOR_SJ`),
  KEY `FK_MENUGASKAN` (`NOMOR_INDUK`),
  KEY `FK_MENUGASKAN2` (`ID_SUPIR`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perencanaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_asal`
--

CREATE TABLE IF NOT EXISTS `tabel_asal` (
  `ID_ASAL` varchar(4) NOT NULL,
  `NAMA_ASAL` char(15) NOT NULL,
  PRIMARY KEY (`ID_ASAL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_asal`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_bbm`
--

CREATE TABLE IF NOT EXISTS `tabel_bbm` (
  `ID_BBM` varchar(5) NOT NULL,
  `JENIS_BBM` char(7) NOT NULL,
  `NAMA_BBM` char(15) NOT NULL,
  `HARGA_BBM` int(11) NOT NULL,
  PRIMARY KEY (`ID_BBM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_bbm`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_customer`
--

CREATE TABLE IF NOT EXISTS `tabel_customer` (
  `ID_PELANGGAN` varchar(10) NOT NULL,
  `NAMA_PELANGGAN` char(20) NOT NULL,
  `ALAMAT_PELANGGAN` varchar(50) NOT NULL,
  `TELP_PELANGGAN` decimal(12,0) DEFAULT NULL,
  `JENIS_PELANGGAN` char(10) DEFAULT NULL,
  PRIMARY KEY (`ID_PELANGGAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_gps`
--

CREATE TABLE IF NOT EXISTS `tabel_gps` (
  `ID_GPS` varchar(10) NOT NULL,
  `ID_GEOFENCING` varchar(50) NOT NULL,
  `NAMA_GEOFENCING` char(30) NOT NULL,
  PRIMARY KEY (`ID_GPS`,`ID_GEOFENCING`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_gps`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengguna`
--

CREATE TABLE IF NOT EXISTS `tabel_pengguna` (
  `NOMOR_INDUK` decimal(4,0) NOT NULL,
  `NAMA_PENGGUNA` char(35) NOT NULL,
  `JENIS_KELAMIN` char(1) NOT NULL,
  `JABATAN_PENGGUNA` char(30) NOT NULL,
  `COMPANY_PENGGUNA` char(30) NOT NULL,
  `TELP_PENGGUNA` decimal(12,0) NOT NULL,
  `ALAMAT_PENGGUNA` varchar(50) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  PRIMARY KEY (`NOMOR_INDUK`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pengguna`
--

INSERT INTO `tabel_pengguna` (`NOMOR_INDUK`, `NAMA_PENGGUNA`, `JENIS_KELAMIN`, `JABATAN_PENGGUNA`, `COMPANY_PENGGUNA`, `TELP_PENGGUNA`, `ALAMAT_PENGGUNA`, `PASSWORD`) VALUES
('1111', 'SUPER IT', 'L', 'Admin', 'PT. Sinar Jati Mitra', '85299640485', 'Jl. Gresik 1-5', '123'),
('2222', 'TEST2', 'P', 'Staff', 'PT. Sinar Jati Mitra', '12345678902', 'QWERTY2', '222222'),
('4444', 'qwerrrrrrrr', 'P', 'Supervisor', 'PT. Sinar Kencana Intermoda', '1232132', 'qwe', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produk`
--

CREATE TABLE IF NOT EXISTS `tabel_produk` (
  `ID_PRODUK` varchar(5) NOT NULL,
  `ID_ASAL` varchar(4) NOT NULL,
  `ID_TUJUAN` varchar(5) NOT NULL,
  `ID_PELANGGAN` varchar(10) NOT NULL,
  `QUANTITY_PRODUK` int(11) NOT NULL,
  `JASA_MITRA` int(11) NOT NULL,
  `BBM` int(11) DEFAULT NULL,
  `UANG_TOL` int(11) DEFAULT NULL,
  `MEL_TIMBANG` int(11) DEFAULT NULL,
  `JASA_BONGKAR` int(11) DEFAULT NULL,
  `JASA_KURAS` int(11) DEFAULT NULL,
  `INSENTIF` int(11) DEFAULT NULL,
  `JASA_KAPAL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUK`),
  KEY `FK_MEMUAT` (`ID_ASAL`),
  KEY `FK_MENUJU` (`ID_TUJUAN`),
  KEY `FK_MENYEDIAKAN` (`ID_PELANGGAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_produk`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_rekap`
--

CREATE TABLE IF NOT EXISTS `tabel_rekap` (
  `ID_REKAP` varchar(8) NOT NULL,
  `ID_LIST` varchar(8) NOT NULL,
  `NOMOR_INDUK` decimal(4,0) NOT NULL,
  `NOMOR_SJ` varchar(8) NOT NULL,
  `NOMOR_SJC` varchar(10) NOT NULL,
  `REVENUE` int(11) NOT NULL,
  `COST` int(11) NOT NULL,
  `MARGIN` int(11) NOT NULL,
  `COST_SUBCON` int(11) NOT NULL,
  `MARGIN_SUBCON` int(11) NOT NULL,
  `TGL_REKAP` datetime NOT NULL,
  PRIMARY KEY (`ID_REKAP`,`NOMOR_SJ`,`NOMOR_SJC`),
  KEY `FK_MEMBUAT` (`NOMOR_INDUK`),
  KEY `FK_REFERENCE_16` (`NOMOR_SJ`),
  KEY `FK_REFERENCE_17` (`NOMOR_SJC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_rekap`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_subcon`
--

CREATE TABLE IF NOT EXISTS `tabel_subcon` (
  `ID_SUBCON` varchar(5) NOT NULL,
  `NAMA_SUBCON` char(30) NOT NULL,
  `ALAMAT_SUBCON` varchar(50) NOT NULL,
  `TELP_SUBCON` decimal(12,0) NOT NULL,
  PRIMARY KEY (`ID_SUBCON`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_subcon`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_supir`
--

CREATE TABLE IF NOT EXISTS `tabel_supir` (
  `ID_SUPIR` decimal(16,0) NOT NULL,
  `ID_SUBCON` varchar(5) DEFAULT NULL,
  `ID_TRUCK` varchar(10) NOT NULL,
  `NOPOL` varchar(8) NOT NULL,
  `NAMA_SUPIR` char(30) NOT NULL,
  `ALAMAT_SUPIR` varchar(50) NOT NULL,
  `TELP_SUPIR` decimal(12,0) NOT NULL,
  `TGL_LAHIR_SUPIR` date NOT NULL,
  `TEMPAT_LAHIR_SUPIR` char(15) NOT NULL,
  `TGL_BERGABUNG` date NOT NULL,
  `SALDO_BBM` tinyint(1) NOT NULL,
  `SALDO_UANG` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_SUPIR`),
  KEY `FK_MEMILIKI` (`ID_SUBCON`),
  KEY `FK_MENGENDARAI` (`ID_TRUCK`,`NOPOL`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_supir`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_truck`
--

CREATE TABLE IF NOT EXISTS `tabel_truck` (
  `ID_TRUCK` varchar(10) NOT NULL,
  `NOPOL` varchar(8) NOT NULL,
  `ID_BBM` varchar(5) NOT NULL,
  `JENIS_TRUCK` varchar(15) NOT NULL,
  `MERK_TRUCK` char(10) NOT NULL,
  `COMPANY_TRUCK` char(30) NOT NULL,
  `VOLUME_BBM` int(11) NOT NULL,
  `KAPASITAS_BBM` int(11) NOT NULL,
  `KAPASITAS_TANGKI` int(11) NOT NULL,
  `TAHUN_PEMBUATAN` date NOT NULL,
  `TGL_KIR` date DEFAULT NULL,
  `NOMOR_LAMBUNG` varchar(4) DEFAULT NULL,
  `NOMOR_RANGKA` varchar(30) DEFAULT NULL,
  `NOMOR_MESIN` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID_TRUCK`,`NOPOL`),
  KEY `FK_MENGGUNAKAN` (`ID_BBM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_truck`
--


-- --------------------------------------------------------

--
-- Table structure for table `tabel_tujuan`
--

CREATE TABLE IF NOT EXISTS `tabel_tujuan` (
  `ID_TUJUAN` varchar(5) NOT NULL,
  `NAMA_TUJUAN` char(20) NOT NULL,
  `AREA_TUJUAN` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_TUJUAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_tujuan`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
