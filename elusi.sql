-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 01:24 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_sidang`
--

CREATE TABLE `anggota_sidang` (
  `id_anggota_sidang` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `role` enum('ketua','sekretaris','anggota') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_sidang`
--

INSERT INTO `anggota_sidang` (`id_anggota_sidang`, `id_sidang`, `id_dosen`, `role`, `createdDtm`, `updatedDtm`) VALUES
(4, 1, 3, 'ketua', '2018-03-28 16:57:40', '2018-03-28 12:07:15'),
(5, 1, 1, 'sekretaris', '2018-03-28 16:57:40', '2018-03-28 12:07:19'),
(6, 1, 2, 'anggota', '2018-03-28 16:57:40', '2018-03-28 11:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `berkas_sidang`
--

CREATE TABLE `berkas_sidang` (
  `id_berkas_sidang` int(11) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_sidang`
--

INSERT INTO `berkas_sidang` (`id_berkas_sidang`, `nama_berkas`, `isDeleted`, `createdDtm`, `updateDtm`) VALUES
(1, 'Usulan Sidang', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(2, 'KRS Semester Terakhir [ACC DPA]', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(3, 'Rekap Nilai', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(4, 'Kartu Hasil Studi [Semester awal hingga akhir]', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(5, 'Kartu Bimbingan [Min. 6 pertemuan]', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(6, 'Kartu Tanda Mahasiswa', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(7, 'Riwayat Registrasi', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(8, 'Proposal Tugas Akhir', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(9, 'Laporan Tugas Akhir', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00'),
(10, 'Cover Laporan TA [ACC dosen pembimbing]', 0, '2018-03-27 11:52:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `berkas_yudisium`
--

CREATE TABLE `berkas_yudisium` (
  `id_berkas_yudisium` int(11) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas_yudisium`
--

INSERT INTO `berkas_yudisium` (`id_berkas_yudisium`, `nama_berkas`, `isDeleted`, `createdDtm`, `updateDtm`) VALUES
(1, 'Permohonan Yudisium', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(2, 'Berita Acara', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(3, 'Surat Tanda Terima Menyerahkan Tugas Akhir & Bebas Perpustakaan UGM', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(4, 'Poster Hasil Tugas Akhir [ukuran A3]', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(5, 'Laporan Tugas Akhir [telah direvisi FINAL]', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(6, 'Ijazah SMA/K Terakhir', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00'),
(7, 'Sertifikat Kemampuan Bahasa Inggris [sesuai ketentuan berlaku]', 0, '2018-03-27 11:53:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dosbing`
--

CREATE TABLE `dosbing` (
  `id_dosbing` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosbing`
--

INSERT INTO `dosbing` (`id_dosbing`, `id_mahasiswa`, `id_dosen`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `skill` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nid`, `nama`, `foto`, `email`, `mobile`, `skill`, `isDeleted`, `id_user`, `createdDtm`, `updatedDtm`) VALUES
(1, '', 'Yusron', 'rsz_be.png', 'yusron@komsi.com', '089212817261', 'fotografi', 0, 5, '2018-03-27 11:45:56', '2018-03-30 10:56:47'),
(2, '912039120', 'Imam Fahrurrozi', '', 'imam@komsi.com', '089273812187', 'manajemen', 0, 6, '2018-03-27 11:46:24', '2018-03-27 16:07:46'),
(3, '', 'Irkham Huda', '', '', '', '', 0, 9, '2018-03-28 10:09:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `waktu` time DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ruang` varchar(255) DEFAULT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id_jadwal`, `id_sidang`, `waktu`, `tanggal`, `ruang`, `createdDtm`, `updatedDtm`) VALUES
(2, 1, '16:57:00', '2018-03-25', 'HY-208', '2018-03-28 16:57:40', '2018-03-30 09:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id_kaprodi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nid` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_akademik` int(11) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `nama`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Tata Tulis', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(2, 'Bahasa', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(3, 'Kesesuaian Rancangan dengan Hasil', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(4, 'Inovasi/Kompleksitas/Aplikatif', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(5, 'Rumusan Masalah', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(6, 'Tujuan', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(7, 'Metode dan Perancangan', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(8, 'Analisis Hasil/Pembahasan', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(9, 'Kesimpulan', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00'),
(10, 'Presentasi', 0, '2018-03-28 06:32:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id_komponen_nilai` int(11) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai` decimal(10,0) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_nilai`
--

INSERT INTO `komponen_nilai` (`id_komponen_nilai`, `id_komponen`, `id_penilaian`, `nilai`, `createdDtm`, `updatedDtm`) VALUES
(31, 1, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:29:58'),
(32, 2, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:30:01'),
(33, 3, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:30:03'),
(34, 4, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:30:06'),
(35, 5, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:30:10'),
(36, 6, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:30:14'),
(37, 7, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(38, 8, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(39, 9, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(40, 10, 4, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(41, 1, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(42, 2, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(43, 3, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(44, 4, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(45, 5, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(46, 6, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(47, 7, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(48, 8, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(49, 9, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(50, 10, 5, '4', '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(51, 1, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(52, 2, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(53, 3, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(54, 4, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(55, 5, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(56, 6, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(57, 7, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(58, 8, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(59, 9, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29'),
(60, 10, 6, '0', '2018-03-28 16:57:40', '2018-03-30 02:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `log_pesan`
--

CREATE TABLE `log_pesan` (
  `id_log` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_pesan`
--

INSERT INTO `log_pesan` (`id_log`, `id_mahasiswa`, `nama`, `deskripsi`, `createdDtm`, `updateDtm`) VALUES
(1, 1, 'Usulan Sidang', 'tolong direvisi', '2018-03-27 14:15:44', '0000-00-00 00:00:00'),
(2, 1, 'KRS Semester Terakhir [ACC DPA]', 'tolong', '2018-03-27 15:54:24', '0000-00-00 00:00:00'),
(3, 1, 'KRS Semester Terakhir [ACC DPA]', 'tolong', '2018-03-27 16:03:07', '0000-00-00 00:00:00'),
(4, 1, 'Rekap Nilai', 'bismillah bener deh, tapi dibenerin dong', '2018-03-27 16:21:47', '0000-00-00 00:00:00'),
(5, 1, 'Kartu Hasil Studi [Semester awal hingga akhir]', 'tolong dibenarkan', '2018-03-27 16:40:34', '0000-00-00 00:00:00'),
(6, 1, 'KRS Semester Terakhir [ACC DPA]', 'ya allah ku mohon', '2018-03-27 17:06:41', '0000-00-00 00:00:00'),
(7, 1, 'Kartu Bimbingan [Min. 6 pertemuan]', 'alhamdulillah', '2018-03-27 17:14:16', '0000-00-00 00:00:00'),
(8, 1, 'Usulan Sidang', 'tolong dibenarkan', '2018-03-27 17:28:13', '0000-00-00 00:00:00'),
(9, 1, 'Berita Acara', 'beritanya salah', '2018-03-27 17:30:42', '0000-00-00 00:00:00'),
(10, 1, 'Berita Acara', 'beritanya salah', '2018-03-27 17:30:52', '0000-00-00 00:00:00'),
(11, 1, 'Berita Acara', 'beritanya kurang bener', '2018-03-27 17:39:16', '0000-00-00 00:00:00'),
(12, 1, 'Berita Acara', 'beritanya kurang bener', '2018-03-27 17:41:32', '0000-00-00 00:00:00'),
(13, 1, 'Permohonan Yudisium', 'mohon', '2018-03-27 17:44:20', '0000-00-00 00:00:00'),
(14, 1, 'Berita Acara', 'tolak berita acara', '2018-03-27 17:49:12', '0000-00-00 00:00:00'),
(15, 1, 'KRS Semester Terakhir [ACC DPA]', 'krs tolak', '2018-03-27 17:49:51', '0000-00-00 00:00:00'),
(16, 1, 'Permohonan Yudisium', 'tolonggg', '2018-03-27 19:54:17', '0000-00-00 00:00:00'),
(17, 1, 'Berita Acara', 'tolonggggggggg', '2018-03-27 19:54:38', '2018-03-30 13:25:05'),
(18, 1, 'Cover Laporan TA [ACC dosen pembimbing]', 'coba deh', '2018-03-28 10:38:30', '0000-00-00 00:00:00'),
(19, 1, 'Cover Laporan TA [ACC dosen pembimbing]', 'masuk sih', '2018-03-28 10:40:14', '0000-00-00 00:00:00'),
(20, 1, 'Pendaftaran sidang diterima.', 'Sidang akan dilaksanakan pada 2018-03-30 , pukul : 15:37 , di ruang : HY-202', '2018-03-28 15:37:37', '0000-00-00 00:00:00'),
(21, 1, 'Pendaftaran sidang diubah.', 'Sidang akan dilaksanakan pada  , pukul : 15:37:00 , di ruang : HY-205', '2018-03-28 16:40:34', '0000-00-00 00:00:00'),
(22, 1, 'Pendaftaran sidang diubah.', 'Sidang akan dilaksanakan pada  , pukul : 15:37:00 , di ruang : HY-205', '2018-03-28 16:41:00', '0000-00-00 00:00:00'),
(23, 1, 'Pendaftaran sidang diubah.', 'Sidang akan dilaksanakan pada  , pukul : 15:37:00 , di ruang : HY-205', '2018-03-28 16:42:34', '0000-00-00 00:00:00'),
(24, 1, 'Pendaftaran sidang diterima.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57 , di ruang : HY-202', '2018-03-28 16:57:40', '0000-00-00 00:00:00'),
(25, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-205', '2018-03-28 17:53:36', '0000-00-00 00:00:00'),
(26, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-205', '2018-03-28 17:55:57', '0000-00-00 00:00:00'),
(27, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-205', '2018-03-28 17:56:41', '0000-00-00 00:00:00'),
(28, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-205', '2018-03-28 17:57:17', '0000-00-00 00:00:00'),
(29, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-206', '2018-03-28 17:57:28', '0000-00-00 00:00:00'),
(30, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 18:25:35', '0000-00-00 00:00:00'),
(31, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 18:58:28', '0000-00-00 00:00:00'),
(32, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 19:07:30', '0000-00-00 00:00:00'),
(33, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-31 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 19:07:42', '0000-00-00 00:00:00'),
(34, 1, 'Permohonan Yudisium', 'dari yudisium untuk kamu', '2018-03-28 21:48:19', '2018-03-30 13:25:02'),
(35, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 0201-03-31 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 21:55:14', '0000-00-00 00:00:00'),
(36, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-20 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-28 21:55:30', '0000-00-00 00:00:00'),
(37, 1, 'Permohonan Yudisium', 'tolong cap kaprodi', '2018-03-30 14:12:00', '2018-03-30 07:44:54'),
(38, 1, 'Permohonan Yudisium', 'tolong benarlah :\'(', '2018-03-30 14:16:46', '0000-00-00 00:00:00'),
(39, 1, 'Permohonan Yudisium', '?', '2018-03-30 14:17:47', '2018-03-30 14:25:28'),
(40, 1, 'Pelaksanaan sidang telah diubah.', 'Sidang akan dilaksanakan pada 2018-03-25 , pukul : 16:57:00 , di ruang : HY-208', '2018-03-30 16:04:57', '0000-00-00 00:00:00'),
(41, 1, 'Pendaftaran Yudisium', 'Berkas yudisium anda telah diterima, silahkan menghubungi pihak akademik untuk lebih lanjut', '2018-03-30 16:42:51', '0000-00-00 00:00:00'),
(42, 3, 'Usulan Sidang', 'tolong beri cap dari akademik', '2018-03-30 20:31:41', '0000-00-00 00:00:00'),
(43, 1, 'Revisi Sidang', '\r\n                            <ul>\r\n                                <?php\r\n                                if(!empty($revisiInfo))\r\n                                {\r\n                                    $i=1;\r\n                                    foreach($revisiInfo as $record)\r\n                                    {\r\n                                        ?>\r\n                                        <li>\r\n                                            <a href=\"<?php echo base_url()?>uploads/sidang/revisi/<?php echo $record->path?>\" target=\"_blank\">\r\n                                                <span class=\"label label-info\">Revisi-<?php echo $i?></span>\r\n                                            </a>\r\n                                        </li>\r\n                                        <?php\r\n                                        $i++;\r\n                                    }\r\n                                }\r\n                                ?>\r\n                            </ul>', '2018-03-30 21:28:41', '0000-00-00 00:00:00'),
(44, 1, 'Revisi Sidang', '\r\n                            <?php\r\n                            if(!empty($revisiInfo))\r\n                            {\r\n                                $i=1;\r\n                                foreach($revisiInfo as $record)\r\n                                {\r\n                                    ?>\r\n                                    <a href=\"<?php echo base_url()?>uploads/sidang/revisi/<?php echo $record->path?>\" target=\"_blank\">\r\n                                        <span class=\"label label-info\">Revisi-<?php echo $i?></span>\r\n                                    </a>\r\n                                    <?php\r\n                                    $i++;\r\n                                }\r\n                            }\r\n                            ?>', '2018-03-30 21:29:57', '0000-00-00 00:00:00'),
(45, 1, 'Revisi Sidang', '<a href=\"mahasiswa/sidang\">klik disini</a>', '2018-03-30 21:49:24', '0000-00-00 00:00:00'),
(46, 1, 'Revisi Sidang', '\r\n                        if(!empty($revisiInfo))\r\n                                {\r\n                                    $i=1;\r\n                                    foreach($revisiInfo as $record)\r\n                                    {\r\n                                        <a href=\"uploads/sidang/revisi/$record->path\">unduh revisi</a>\r\n                                    }\r\n                                    $i++\r\n                                }', '2018-03-30 21:53:28', '0000-00-00 00:00:00'),
(47, 1, 'Revisi Sidang', '\r\n                        if(!empty($revisiInfo))\r\n                                {\r\n                                    $i=1;\r\n                                    foreach($revisiInfo as $record)\r\n                                    {\r\n                                        <\\a href=\"uploads/sidang/revisi/$record->path\">unduh revisi</a\\>\r\n                                    }\r\n                                    $i++\r\n                                }', '2018-03-30 21:55:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `ipk` double NOT NULL,
  `jumlah_SKS` int(5) NOT NULL,
  `skill` text NOT NULL,
  `pengalaman` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `email`, `mobile`, `foto`, `ipk`, `jumlah_SKS`, `skill`, `pengalaman`, `id_user`, `createdDtm`, `updatedDtm`) VALUES
(1, '15/386071/SV/09457', 'Mahasiswa Lengkap', 'mahasiswa@komsi.com', '085712939029', 'Foto-1522159935.png', 108, 108, 'Makan,Tidur,Mandi', 'Renang tingkat desa', 7, '2018-03-27 21:16:22', '2018-03-27 14:16:22'),
(2, '', 'Peni Kurniawati', 'peni@komsi.com', '085713948271', 'Foto-1522194852.png', 108, 108, 'Makan,Tidur,Mandi', 'Banyak', 8, '2018-03-28 06:54:07', '2018-03-27 23:54:12'),
(3, '', 'Peni Kurniawati', 'penikurniawati7@gmail.com', '085738291283', 'Foto-1522416335.png', 3.9, 108, 'Masak', 'Juara 1 lari marathon', 10, '2018-03-30 20:27:35', '2018-03-30 13:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ta`
--

CREATE TABLE `pengajuan_ta` (
  `id_pengajuan_ta` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `pilihan` tinyint(4) NOT NULL,
  `status` enum('diterima','proses','ditolak') NOT NULL DEFAULT 'proses',
  `jenis` enum('proyek','usul') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_ta`
--

INSERT INTO `pengajuan_ta` (`id_pengajuan_ta`, `id_ta`, `id_proyek`, `pilihan`, `status`, `jenis`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 3, 1, 'diterima', 'proyek', '2018-03-28 08:43:16', '0000-00-00 00:00:00'),
(2, 1, 1, 2, 'ditolak', 'proyek', '2018-03-28 08:43:16', '0000-00-00 00:00:00'),
(3, 1, 2, 3, 'proses', 'proyek', '2018-03-28 08:43:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` varchar(128) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `deskripsi`, `lampiran`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Surat Penerimaan Tugas Akhir', 'Silahkan unduh file terlampir', '20180327114217-proposal-1522068411.pdf', 0, '2018-03-27 11:42:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nilai_akhir_dosen` double DEFAULT '0',
  `id_anggota_sidang` int(11) DEFAULT NULL,
  `id_sidang` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nilai_akhir_dosen`, `id_anggota_sidang`, `id_sidang`, `createdDtm`, `updatedDtm`) VALUES
(4, 0, 4, 1, '2018-03-28 16:57:40', '2018-03-30 02:29:26'),
(5, 4, 5, 1, '2018-03-28 16:57:40', '2018-03-30 10:31:40'),
(6, 0, 6, 1, '2018-03-28 16:57:40', '2018-03-30 02:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `jenis` enum('ta','yudisium') NOT NULL,
  `tanggal_awal_regis` datetime NOT NULL,
  `tanggal_akhir_regis` datetime NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `semester`, `tahun_ajaran`, `jenis`, `tanggal_awal_regis`, `tanggal_akhir_regis`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'genap', '2017/2018', 'ta', '2018-03-18 12:00:00', '2018-04-07 12:00:00', 0, '2018-03-27 11:43:24', '0000-00-00 00:00:00'),
(2, 'genap', '2017/2018', 'yudisium', '2018-03-26 11:43:00', '2018-05-31 11:44:00', 0, '2018-03-27 11:44:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `klien` varchar(255) DEFAULT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL DEFAULT 'pending',
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama`, `id_dosen`, `klien`, `status`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Animasi 3 Dimensi', 1, 'Filem', 'disetujui', 0, '2018-03-27 11:49:45', '2018-03-28 09:51:42'),
(2, 'Sistem Informasi Keuangan', 2, 'Pt. Permata', 'disetujui', 0, '2018-03-27 11:50:10', '2018-03-27 04:50:30'),
(3, 'Sistem Informasi Kantin Jujur', 2, 'Sekolah Vokasi', 'disetujui', 0, '2018-03-27 23:11:27', '2018-03-28 01:44:25'),
(4, 'Aplikasi Tabungan Berbasis Android', 3, 'Craecle .org', 'pending', 0, '2018-03-28 21:20:23', '0000-00-00 00:00:00'),
(5, 'Sds', 3, 'Sss', 'pending', 0, '2018-03-30 18:20:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `revisi_sidang`
--

CREATE TABLE `revisi_sidang` (
  `id_revisi_sidang` int(11) NOT NULL,
  `id_anggota_sidang` int(11) NOT NULL,
  `path` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi_sidang`
--

INSERT INTO `revisi_sidang` (`id_revisi_sidang`, `id_anggota_sidang`, `path`) VALUES
(1, 5, 'revisi-1522330226.pdf'),
(2, 4, 'revisi-1522364327.pdf'),
(3, 6, 'revisi-1522364414.pdf'),
(4, 5, 'revisi-1522420092.pdf'),
(5, 5, 'revisi-1522420121.pdf'),
(6, 5, 'revisi-1522420197.pdf'),
(7, 5, 'revisi-1522421364.pdf'),
(8, 5, 'revisi-1522421608.pdf'),
(9, 5, 'revisi-1522421723.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id_sidang` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilai_akhir_sidang` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('disetujui','pending','ditolak') NOT NULL DEFAULT 'pending',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`id_sidang`, `id_mahasiswa`, `nilai_akhir_sidang`, `status`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, '1.33', 'disetujui', '2018-03-27 11:54:14', '2018-03-30 10:31:40'),
(3, 3, '0.00', 'pending', '2018-03-30 20:28:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id_ta` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `status_pengambilan` enum('nonaktif','proses','terplotting') NOT NULL DEFAULT 'proses',
  `id_periode` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_akhir`
--

INSERT INTO `tugas_akhir` (`id_ta`, `id_mahasiswa`, `status_pengambilan`, `id_periode`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 'terplotting', 1, '2018-03-28 08:41:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_role` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_user_role`, `username`, `password`, `nama`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 2, 'akademik', '$2y$10$pZIJuVGlZ.KQiYEx1bKme.m3Kk3y1KQKhBmSwMotnvzteG4u9b9pq', 'Ningrum', 0, '2018-03-27 11:40:54', '0000-00-00 00:00:00'),
(2, 3, 'dosen', '$2y$10$Vmvtg0Ss0g4bViocFF3PaOF.XNX/MCOsCNvzmMSB4dBBCqHSMYprO', 'Yusron', 1, '2018-03-27 11:40:54', '2018-03-27 04:45:33'),
(3, 4, 'havil', '$2y$10$04KYHHuQfn4wDK99WjV9LOxMAIz6CG7AKtc54wmZW2uEZtShjJAly', 'Havil', 0, '2018-03-27 11:40:54', '2018-03-27 04:48:12'),
(4, 1, 'kaprodi', '$2y$10$oIELWnrsPwvz4xI8/mWJjubTuiaSg3DSwZWaBfCTPBcTdEpA9fmIa', 'Rifqi', 1, '2018-03-27 11:40:54', '2018-03-27 04:48:38'),
(5, 3, 'dosen', '$2y$10$U1hBcu88o/WPzQoUSDL.0eEVL6loA2fWBbF3/ShyRvbF34Glt5qVG', 'Yusron', 0, '2018-03-27 11:45:56', '0000-00-00 00:00:00'),
(6, 3, 'imam', '$2y$10$FkVAzeTx/Iwc1NdofiKkXueljRMXU3tcdsss8Tx980fmSIyWUsKW.', 'Imam Fahrurrozi', 0, '2018-03-27 11:46:24', '0000-00-00 00:00:00'),
(7, 4, 'mahasiswa', '$2y$10$19InU3wrb9hBHqyNpv7WrOseoopWrl3ouNKlPXMVWOrbyoWupSzXG', 'mahasiswa', 0, '2018-03-27 11:48:26', '0000-00-00 00:00:00'),
(8, 4, 'peni', '$2y$10$HUQeUTyUtiq1ayJIJeaVTuzqrkkZA4owhg9Oe9SBet5jIzxVlsdq.', 'Peni', 0, '2018-03-28 06:53:20', '0000-00-00 00:00:00'),
(9, 3, 'Irkham', '$2y$10$ptxG/SG5/pqrt1AupNp.0ecq1DJXgvE.Gm065pXYLQPGMhLXtOzIW', 'Irkham Huda', 0, '2018-03-28 10:09:02', '0000-00-00 00:00:00'),
(10, 4, '386071', '$2y$10$R974zwSCunaazaTldSgrfOMAGT/6VNNtl93LWMzy/YJoJLmkKm92.', 'Peni Kurniawati', 0, '2018-03-30 20:24:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` tinyint(4) NOT NULL,
  `role` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `role`, `createdDtm`, `updateDtm`) VALUES
(1, 'Kaprodi', '2018-03-27 11:38:23', '0000-00-00 00:00:00'),
(2, 'Akademik', '2018-03-27 11:38:23', '0000-00-00 00:00:00'),
(3, 'Dosen', '2018-03-27 11:38:23', '0000-00-00 00:00:00'),
(4, 'Mahasiswa', '2018-03-27 11:38:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_pengajuan_ta` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `bisnis_rule` text NOT NULL,
  `file` varchar(128) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `validasi_berkas_sidang`
--

CREATE TABLE `validasi_berkas_sidang` (
  `id_valid_sidang` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_berkas_sidang` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `isValid` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_berkas_sidang`
--

INSERT INTO `validasi_berkas_sidang` (`id_valid_sidang`, `id_sidang`, `id_berkas_sidang`, `path`, `isValid`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 1, 'usulan-1522126521.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 10:32:37'),
(2, 1, 2, 'krs-1522142645.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 10:52:19'),
(3, 1, 3, 'rekap-1522128404.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:29'),
(4, 1, 4, 'khs-1522128415.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:31'),
(5, 1, 5, 'bimbingan-1522128430.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 11:44:21'),
(6, 1, 6, 'ktm-1522191226.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:32'),
(7, 1, 7, 'riwayat-1522191233.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:34'),
(8, 1, 8, 'proposal-1522191241.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:35'),
(9, 1, 9, 'laporan-1522191248.pdf', 2, '2018-03-27 11:54:14', '2018-03-27 22:55:37'),
(10, 1, 10, 'cover-1522191254.pdf', 2, '2018-03-27 11:54:14', '2018-03-28 03:40:23'),
(11, 3, 1, 'usulan-1522416544.pdf', 3, '2018-03-30 20:28:02', '2018-03-30 13:31:41'),
(12, 3, 2, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(13, 3, 3, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(14, 3, 4, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(15, 3, 5, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(16, 3, 6, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(17, 3, 7, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(18, 3, 8, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(19, 3, 9, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00'),
(20, 3, 10, '', 0, '2018-03-30 20:28:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_berkas_yudisium`
--

CREATE TABLE `validasi_berkas_yudisium` (
  `id_valid_yudisium` int(11) NOT NULL,
  `id_yudisium` int(11) NOT NULL,
  `id_berkas_yudisium` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `isValid` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_berkas_yudisium`
--

INSERT INTO `validasi_berkas_yudisium` (`id_valid_yudisium`, `id_yudisium`, `id_berkas_yudisium`, `path`, `isValid`, `createdDtm`, `updatedDtm`) VALUES
(8, 5, 1, 'permohonan-1522393747.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:25:56'),
(9, 5, 2, 'beritaacara-1522393753.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:25:57'),
(10, 5, 3, 'suratterima-1522393759.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:25:58'),
(11, 5, 4, 'poster-1522393766.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:25:59'),
(12, 5, 5, 'laporanfinal-1522393773.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:26:01'),
(13, 5, 6, 'ijazah-1522393778.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:26:04'),
(14, 5, 7, 'sertifikat-1522393783.pdf', 2, '2018-03-30 14:08:54', '2018-03-30 07:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `yudisium`
--

CREATE TABLE `yudisium` (
  `id_yudisium` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL DEFAULT 'pending',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yudisium`
--

INSERT INTO `yudisium` (`id_yudisium`, `id_mahasiswa`, `id_periode`, `status`, `createdDtm`, `updatedDtm`) VALUES
(5, 1, 2, 'disetujui', '2018-03-30 14:08:54', '2018-03-30 09:42:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `anggota_sidang`
--
ALTER TABLE `anggota_sidang`
  ADD PRIMARY KEY (`id_anggota_sidang`),
  ADD KEY `id_sidang` (`id_sidang`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `berkas_sidang`
--
ALTER TABLE `berkas_sidang`
  ADD PRIMARY KEY (`id_berkas_sidang`);

--
-- Indexes for table `berkas_yudisium`
--
ALTER TABLE `berkas_yudisium`
  ADD PRIMARY KEY (`id_berkas_yudisium`);

--
-- Indexes for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD PRIMARY KEY (`id_dosbing`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_sidang` (`id_sidang`);

--
-- Indexes for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD PRIMARY KEY (`id_kaprodi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_akademik` (`id_akademik`);

--
-- Indexes for table `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indexes for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  ADD PRIMARY KEY (`id_komponen_nilai`),
  ADD KEY `id_komponen` (`id_komponen`),
  ADD KEY `id_penilaian` (`id_penilaian`);

--
-- Indexes for table `log_pesan`
--
ALTER TABLE `log_pesan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengajuan_ta`
--
ALTER TABLE `pengajuan_ta`
  ADD PRIMARY KEY (`id_pengajuan_ta`),
  ADD KEY `id_ta` (`id_ta`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_sidang` (`id_sidang`),
  ADD KEY `peniaian_ibfk_3` (`id_anggota_sidang`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `revisi_sidang`
--
ALTER TABLE `revisi_sidang`
  ADD PRIMARY KEY (`id_revisi_sidang`),
  ADD KEY `id_anggota_sidang` (`id_anggota_sidang`);

--
-- Indexes for table `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`id_sidang`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD PRIMARY KEY (`id_ta`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_role` (`id_user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_pengajuan_ta` (`id_pengajuan_ta`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `validasi_berkas_sidang`
--
ALTER TABLE `validasi_berkas_sidang`
  ADD PRIMARY KEY (`id_valid_sidang`),
  ADD KEY `id_sidang` (`id_sidang`),
  ADD KEY `id_berkas_sidang` (`id_berkas_sidang`);

--
-- Indexes for table `validasi_berkas_yudisium`
--
ALTER TABLE `validasi_berkas_yudisium`
  ADD PRIMARY KEY (`id_valid_yudisium`),
  ADD KEY `id_yudisium` (`id_yudisium`),
  ADD KEY `id_berkas_yudisium` (`id_berkas_yudisium`);

--
-- Indexes for table `yudisium`
--
ALTER TABLE `yudisium`
  ADD PRIMARY KEY (`id_yudisium`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_periode` (`id_periode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anggota_sidang`
--
ALTER TABLE `anggota_sidang`
  MODIFY `id_anggota_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `berkas_sidang`
--
ALTER TABLE `berkas_sidang`
  MODIFY `id_berkas_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `berkas_yudisium`
--
ALTER TABLE `berkas_yudisium`
  MODIFY `id_berkas_yudisium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dosbing`
--
ALTER TABLE `dosbing`
  MODIFY `id_dosbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id_kaprodi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  MODIFY `id_komponen_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `log_pesan`
--
ALTER TABLE `log_pesan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengajuan_ta`
--
ALTER TABLE `pengajuan_ta`
  MODIFY `id_pengajuan_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `revisi_sidang`
--
ALTER TABLE `revisi_sidang`
  MODIFY `id_revisi_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validasi_berkas_sidang`
--
ALTER TABLE `validasi_berkas_sidang`
  MODIFY `id_valid_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `validasi_berkas_yudisium`
--
ALTER TABLE `validasi_berkas_yudisium`
  MODIFY `id_valid_yudisium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `yudisium`
--
ALTER TABLE `yudisium`
  MODIFY `id_yudisium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akademik`
--
ALTER TABLE `akademik`
  ADD CONSTRAINT `akademik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota_sidang`
--
ALTER TABLE `anggota_sidang`
  ADD CONSTRAINT `anggota_sidang_ibfk_1` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_sidang_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosbing`
--
ALTER TABLE `dosbing`
  ADD CONSTRAINT `dosbing_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosbing_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  ADD CONSTRAINT `jadwal_sidang_ibfk_1` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kaprodi`
--
ALTER TABLE `kaprodi`
  ADD CONSTRAINT `kaprodi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kaprodi_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kaprodi_ibfk_3` FOREIGN KEY (`id_akademik`) REFERENCES `akademik` (`id_akademik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  ADD CONSTRAINT `komponen_nilai_ibfk_1` FOREIGN KEY (`id_komponen`) REFERENCES `komponen` (`id_komponen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komponen_nilai_ibfk_2` FOREIGN KEY (`id_penilaian`) REFERENCES `penilaian` (`id_penilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_ta`
--
ALTER TABLE `pengajuan_ta`
  ADD CONSTRAINT `pengajuan_ta_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tugas_akhir` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ta_ibfk_2` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_anggota_sidang`) REFERENCES `anggota_sidang` (`id_anggota_sidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revisi_sidang`
--
ALTER TABLE `revisi_sidang`
  ADD CONSTRAINT `revisi_sidang_ibfk_1` FOREIGN KEY (`id_anggota_sidang`) REFERENCES `anggota_sidang` (`id_anggota_sidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `sidang_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD CONSTRAINT `tugas_akhir_ibfk_6` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_akhir_ibfk_7` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_pengajuan_ta`) REFERENCES `pengajuan_ta` (`id_pengajuan_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usulan_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `validasi_berkas_sidang`
--
ALTER TABLE `validasi_berkas_sidang`
  ADD CONSTRAINT `validasi_berkas_sidang_ibfk_1` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validasi_berkas_sidang_ibfk_2` FOREIGN KEY (`id_berkas_sidang`) REFERENCES `berkas_sidang` (`id_berkas_sidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `validasi_berkas_yudisium`
--
ALTER TABLE `validasi_berkas_yudisium`
  ADD CONSTRAINT `validasi_berkas_yudisium_ibfk_1` FOREIGN KEY (`id_yudisium`) REFERENCES `yudisium` (`id_yudisium`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `validasi_berkas_yudisium_ibfk_2` FOREIGN KEY (`id_berkas_yudisium`) REFERENCES `berkas_yudisium` (`id_berkas_yudisium`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yudisium`
--
ALTER TABLE `yudisium`
  ADD CONSTRAINT `yudisium_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yudisium_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
