-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 08:04 AM
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

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `nama`, `isDeleted`, `id_user`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Anang', 0, 14, '2018-03-19 01:24:04', '0000-00-00 00:00:00'),
(2, 'John Doe Anwar', 0, 15, '2018-03-19 10:54:07', '2018-03-19 03:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_sidang`
--

CREATE TABLE `anggota_sidang` (
  `id_anggota_sidang` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `role` enum('ketua','sekretaris','anggota') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_sidang`
--

INSERT INTO `anggota_sidang` (`id_anggota_sidang`, `id_sidang`, `id_dosen`, `role`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 2, 'ketua', '2018-03-24 12:09:56', '0000-00-00 00:00:00'),
(2, 1, 3, 'sekretaris', '2018-03-24 12:09:56', '0000-00-00 00:00:00'),
(3, 1, 1, 'anggota', '2018-03-24 12:09:56', '0000-00-00 00:00:00');

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
(1, 'Usulan Sidang', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(2, 'KRS Semester Terakhir [ACC DPA]', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(3, 'Rekap Nilai', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(4, 'Kartu Hasil Studi [Semester awal hingga akhir]', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(5, 'Kartu Bimbingan [Min. 6 pertemuan]', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(6, 'Kartu Tanda Mahasiswa', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(7, 'Riwayat Registrasi', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(8, 'Proposal Tugas Akhir', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(9, 'Laporan Tugas Akhir', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00'),
(10, 'Cover Laporan TA [ACC dosen pembimbing]', 0, '2018-03-24 11:35:26', '0000-00-00 00:00:00');

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
(1, 'Permohonan Yudisium', 0, '2018-03-22 13:44:16', '0000-00-00 00:00:00'),
(2, 'Berita Acara', 0, '2018-03-22 13:44:16', '0000-00-00 00:00:00'),
(3, 'Surat Tanda Terima Menyerahkan Tugas Akhir & Bebas Perpustakaan UGM', 0, '2018-03-22 13:44:43', '0000-00-00 00:00:00'),
(4, 'Poster Hasil Tugas Akhir [ukuran A3]', 0, '2018-03-22 13:44:43', '0000-00-00 00:00:00'),
(5, 'Laporan Tugas Akhir [telah direvisi FINAL]', 0, '2018-03-22 13:45:36', '0000-00-00 00:00:00'),
(6, 'Ijazah SMA/K Terakhir', 0, '2018-03-22 13:45:36', '0000-00-00 00:00:00'),
(7, 'Sertifikat Kemampuan Bahasa Inggris [sesuai ketentuan berlaku]', 0, '2018-03-22 13:45:45', '0000-00-00 00:00:00');

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
(1, 1, 1);

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
(1, '9012398124124', 'Yusron F', '', 'yusron@gmail.com', '086471828391', 'Animasi, Perfilman', 0, 13, '2018-03-19 01:19:55', '2018-03-23 10:56:23'),
(2, '', 'Test', '', '', '', '', 0, 2, '2018-03-22 21:53:31', '0000-00-00 00:00:00'),
(3, '', 'Ini Dosen', '', '', '', '', 0, 2, '2018-03-23 10:45:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang`
--

CREATE TABLE `jadwal_sidang` (
  `id_jadwal` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `waktu` time NOT NULL,
  `tanggal` date NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_sidang`
--

INSERT INTO `jadwal_sidang` (`id_jadwal`, `id_sidang`, `waktu`, `tanggal`, `ruang`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, '09:40:00', '2018-03-28', 'HY-126', '2018-03-24 12:12:20', '0000-00-00 00:00:00');

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
  `isDeleted` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `nama`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Tata Tulis', 0, '2018-03-05 15:03:15', '2018-03-22 05:56:16'),
(2, 'Bahasa', 0, '2018-03-22 12:55:49', '2018-03-22 05:56:29'),
(3, 'Kesesuaian Rancangan dengan Hasil', 0, '2018-03-22 12:55:49', '2018-03-22 05:57:18'),
(4, 'Inovasi / Kompleksitas', 0, '2018-03-22 12:57:56', '0000-00-00 00:00:00'),
(5, 'Rumusan Masalah', 0, '2018-03-22 12:57:56', '0000-00-00 00:00:00'),
(6, 'Tujuan', 0, '2018-03-22 12:58:19', '0000-00-00 00:00:00'),
(7, 'Metode dan Perancangan', 0, '2018-03-22 12:58:19', '0000-00-00 00:00:00'),
(8, 'Analisis Hasil dan Pembahasan', 0, '2018-03-22 12:59:11', '0000-00-00 00:00:00'),
(9, 'Kesimpulan', 0, '2018-03-22 12:59:11', '0000-00-00 00:00:00'),
(10, 'Presentasi', 0, '2018-03-22 12:59:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id_komponen_nilai` int(11) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai` int(11) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komponen_nilai`
--

INSERT INTO `komponen_nilai` (`id_komponen_nilai`, `id_komponen`, `id_penilaian`, `nilai`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:13'),
(2, 2, 1, 4, '2018-03-24 12:19:41', '0000-00-00 00:00:00'),
(3, 3, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:17'),
(4, 4, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:20'),
(5, 5, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:23'),
(6, 6, 1, 4, '2018-03-24 12:19:41', '0000-00-00 00:00:00'),
(7, 7, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:26'),
(8, 8, 1, 4, '2018-03-24 12:19:41', '0000-00-00 00:00:00'),
(9, 9, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:29'),
(10, 10, 1, 4, '2018-03-24 12:19:41', '2018-03-24 05:34:32'),
(11, 1, 2, 4, '2018-03-24 12:26:29', '0000-00-00 00:00:00'),
(12, 2, 2, 4, '2018-03-24 12:26:29', '2018-03-24 05:34:36'),
(13, 3, 2, 4, '2018-03-24 12:26:29', '0000-00-00 00:00:00'),
(14, 4, 2, 4, '2018-03-24 12:26:29', '2018-03-24 05:34:38'),
(15, 5, 2, 4, '2018-03-24 12:26:29', '0000-00-00 00:00:00'),
(16, 6, 2, 4, '2018-03-24 12:26:29', '2018-03-24 05:34:42'),
(17, 7, 2, 4, '2018-03-24 12:26:29', '0000-00-00 00:00:00'),
(18, 8, 2, 4, '2018-03-24 12:26:29', '2018-03-24 05:34:45'),
(19, 9, 2, 4, '2018-03-24 12:26:29', '2018-03-24 05:34:48'),
(20, 10, 2, 4, '2018-03-24 12:26:29', '0000-00-00 00:00:00'),
(21, 1, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(22, 2, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(23, 3, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(24, 4, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(25, 5, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(26, 6, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(27, 7, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(28, 8, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(29, 9, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00'),
(30, 10, 3, 4, '2018-03-24 12:31:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_pesan`
--

CREATE TABLE `log_pesan` (
  `id_log` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '15/384470/SV/08827', 'Havil Wintas Ernanda', 'bisa@gmail.com', '085728392019', '', 3.94, 108, 'Makan,Tidur,Mandi', 'Banyak', 3, '2018-03-23 10:43:16', '2018-03-23 10:56:02'),
(2, '15/384712/SV/09384', 'Dandy Ari R', 'dandy@gmail.com', '087129381723', '', 3.81, 105, 'Cari pokemon', 'Banyak bet', 10, '2018-03-19 01:08:48', '2018-03-24 03:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ta`
--

CREATE TABLE `pengajuan_ta` (
  `id_pengajuan_ta` int(11) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `pilihan` tinyint(4) NOT NULL,
  `status` enum('diterima','proses','ditolak') NOT NULL DEFAULT 'proses',
  `jenis` enum('proyek','usul') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_ta`
--

INSERT INTO `pengajuan_ta` (`id_pengajuan_ta`, `id_ta`, `pilihan`, `status`, `jenis`, `createdDtm`, `updatedDtm`) VALUES
(1, 3, 1, 'diterima', 'proyek', '2018-03-24 11:17:44', '2018-03-24 06:54:18'),
(2, 3, 2, 'ditolak', 'proyek', '2018-03-24 11:17:44', '2018-03-24 06:54:23'),
(3, 3, 3, 'ditolak', 'proyek', '2018-03-24 11:18:14', '2018-03-24 06:54:27'),
(4, 2, 1, 'proses', 'usul', '2018-03-24 11:18:41', '0000-00-00 00:00:00'),
(5, 2, 2, 'proses', 'proyek', '2018-03-24 11:19:08', '0000-00-00 00:00:00'),
(6, 2, 3, 'proses', 'proyek', '2018-03-24 11:19:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ta_proyek`
--

CREATE TABLE `pengajuan_ta_proyek` (
  `id_pengajuan_ta_proyek` int(11) NOT NULL,
  `id_pengajuan_ta` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_ta_proyek`
--

INSERT INTO `pengajuan_ta_proyek` (`id_pengajuan_ta_proyek`, `id_pengajuan_ta`, `id_proyek`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 9, '2018-03-24 11:23:45', '0000-00-00 00:00:00'),
(2, 2, 4, '2018-03-24 11:23:45', '0000-00-00 00:00:00'),
(3, 3, 6, '2018-03-24 11:24:00', '0000-00-00 00:00:00'),
(4, 4, 5, '2018-03-24 11:24:25', '0000-00-00 00:00:00'),
(5, 6, 8, '2018-03-24 11:24:25', '0000-00-00 00:00:00'),
(6, 5, 4, '2018-03-24 11:24:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nilai_akhir_dosen` int(11) DEFAULT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `nilai_akhir_dosen`, `id_dosen`, `id_sidang`, `createdDtm`, `updatedDtm`) VALUES
(1, 4, 2, 1, '2018-03-24 12:17:02', '2018-03-24 05:35:04'),
(2, 4, 3, 1, '2018-03-24 12:17:02', '2018-03-24 05:35:06'),
(3, 4, 1, 1, '2018-03-24 12:17:02', '2018-03-24 05:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun ajaran` varchar(20) NOT NULL,
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

INSERT INTO `periode` (`id_periode`, `semester`, `tahun ajaran`, `jenis`, `tanggal_awal_regis`, `tanggal_akhir_regis`, `isDeleted`, `createdDtm`, `updatedDtm`) VALUES
(1, 'Ganjil', '2017/2018', 'ta', '2018-03-01 00:00:00', '2018-04-27 00:00:00', 0, '2018-03-24 10:38:42', '0000-00-00 00:00:00'),
(2, 'Ganjil', '2017/2018', 'yudisium', '2018-03-30 00:00:00', '2018-04-29 00:00:00', 0, '2018-03-24 10:39:47', '0000-00-00 00:00:00');

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
(3, 'Sistem Informasi Manajemen Keuangan', 1, 'PT Bank Pertama', 'disetujui', 0, '2018-03-22 14:07:03', '2018-03-24 04:20:58'),
(4, 'Sistem Informasi Perencanaan Manual', 1, 'Bengkel Mobilan Indonesia', 'disetujui', 0, '2018-03-22 14:07:03', '2018-03-22 14:30:38'),
(5, 'Sistem Baru', 1, 'Komsi', 'disetujui', 0, '2018-03-23 12:26:11', '2018-03-24 04:21:04'),
(6, 'Animasi 3 Dimensi', 3, 'Akasacara', 'disetujui', 0, '2018-03-23 12:28:20', '2018-03-24 04:21:10'),
(7, 'Movieeone', 1, 'Twentyone', 'disetujui', 0, '2018-03-23 13:07:50', '2018-03-24 04:21:16'),
(8, 'Sistem Baru Banget', 1, 'Komsi', 'disetujui', 0, '2018-03-23 13:14:58', '2018-03-24 04:21:20'),
(9, 'Sistem Manajemen Keuangan', 1, 'Pt. Bca', 'pending', 0, '2018-03-24 11:22:18', '0000-00-00 00:00:00'),
(10, 'Sistem Animasi Terbaru', 1, 'Multimedia', 'pending', 0, '2018-03-24 11:22:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id_sidang` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilai_akhir_sidang` int(11) NOT NULL DEFAULT '0',
  `status` enum('disetujui','pending','ditolak') NOT NULL DEFAULT 'pending',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sidang`
--

INSERT INTO `sidang` (`id_sidang`, `id_mahasiswa`, `nilai_akhir_sidang`, `status`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 0, 'disetujui', '2018-03-24 11:29:34', '2018-03-24 04:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id_ta` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `status_pengambilan` enum('nonaktif','proses','terplotting') NOT NULL DEFAULT 'proses',
  `id_periode` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_akhir`
--

INSERT INTO `tugas_akhir` (`id_ta`, `id_mahasiswa`, `id_dosen`, `status_pengambilan`, `id_periode`, `createdDtm`, `updatedDtm`) VALUES
(2, 1, NULL, 'terplotting', 1, '2018-03-24 11:02:13', '2018-03-24 06:01:31'),
(3, 2, 1, 'terplotting', 2, '2018-03-24 11:06:51', '2018-03-24 05:57:32');

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
(1, 2, 'akademik', '$2y$10$oIELWnrsPwvz4xI8/mWJjubTuiaSg3DSwZWaBfCTPBcTdEpA9fmIa', 'Ningrum', 0, '2018-03-07 11:46:58', '2018-03-22 06:39:56'),
(2, 3, 'dosen', '$2y$10$mUVkAAx60e4HQGmos2ITeOImlGELHb7wwIHN/.ZHoopJPXw8wX66m', 'Irkham', 0, '2018-03-07 11:48:07', '2018-03-22 06:39:18'),
(3, 4, 'mahasiswa', '$2y$10$04KYHHuQfn4wDK99WjV9LOxMAIz6CG7AKtc54wmZW2uEZtShjJAly', 'Havil Wintas Ernanda', 0, '2018-03-07 11:48:07', '2018-03-23 06:02:12'),
(4, 1, 'kaprodi', '$2y$10$oIELWnrsPwvz4xI8/mWJjubTuiaSg3DSwZWaBfCTPBcTdEpA9fmIa', 'Muh. Fakrurifqi', 0, '2018-03-14 17:10:46', '2018-03-22 06:39:49'),
(5, 4, 'nadya', '$2y$10$b8zb7fqG/ePxvs2O/TouyeFU.N7cxzVfLaupJjRwogW.XQC5/63Oq', 'Nadya Prabaningrum', 0, '2018-03-14 17:21:25', '2018-03-16 06:26:45'),
(6, 4, 'peni', '$2y$10$MzajKs.BvhZ0kBFnMsLbUO6oc2C608FX30gmrwSN3gXlehhu9w/TO', 'Peni Kurniawati', 0, '2018-03-16 13:25:31', '0000-00-00 00:00:00'),
(7, 4, 'abdurahman', '$2y$10$l3TcFZaynNcH3eH4nu/AuO1LyaSPQ5FBAMuc/0c56c1anBf7bPbyy', 'Abdurahman', 0, '2018-03-16 13:26:11', '2018-03-18 17:45:28'),
(8, 4, 'afif', '$2y$10$g0cqUNFpkTsIDqfPKMXDN.7nKH4SYM1rZPaYznRZ.FVk9GR5JTB8e', 'Afif Imaduddin', 1, '2018-03-18 22:18:49', '2018-03-18 16:38:20'),
(10, 4, 'dandy', '$2y$10$nlp0LDaZrl2Vyzq9NNgM1.fEyeM8PXJwU00OsbRfrL8A4nu7tmLTe', 'Dandy Ari R', 0, '2018-03-19 01:08:48', '0000-00-00 00:00:00'),
(13, 3, 'yusron', '$2y$10$0WjYH8AAab3LsWi5c0m1lOD1Hs8I/esM80m6MRgIFUtajvAFxVwEO', 'Yusron', 0, '2018-03-19 01:19:55', '0000-00-00 00:00:00'),
(14, 2, 'anang', '$2y$10$bw668XkqKRnm6APP6NfBJekJ5Gi9MRcA4UF7Yj2EQfbkzlZLvS9Le', 'Anang', 0, '2018-03-19 01:24:03', '0000-00-00 00:00:00'),
(15, 2, 'john', '$2y$10$yRPqhcVBAeNIqBhBDvZ32e1nmrYF1i74Pgvlm3NLp.mc9dqJK7kaa', 'John Doe Anwar', 0, '2018-03-19 10:54:07', '2018-03-19 03:56:10');

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
(1, 'Kaprodi', '2018-03-05 09:59:03', '2018-03-13 01:22:54'),
(2, 'Akademik', '2018-03-05 09:59:58', '2018-03-13 01:22:51'),
(3, 'Dosen', '2018-03-05 10:00:33', '2018-03-13 01:23:16'),
(4, 'Mahasiswa', '2018-03-13 08:23:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_pengajuan_ta` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `bisnis` varchar(255) NOT NULL,
  `file` varchar(128) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `id_pengajuan_ta`, `judul`, `deskripsi`, `bisnis`, `file`, `id_dosen`, `createdDtm`, `updatedDtm`) VALUES
(1, 4, 'Sistem Usulan Terbaru', 'Ini mencoba daftar TA yang usulan', 'Ini menggunakan data bisnis yang dulu', '', NULL, '2018-03-24 11:28:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_berkas_sidang`
--

CREATE TABLE `validasi_berkas_sidang` (
  `id_valid_sidang` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_berkas_sidang` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `isValid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_berkas_sidang`
--

INSERT INTO `validasi_berkas_sidang` (`id_valid_sidang`, `id_sidang`, `id_berkas_sidang`, `path`, `isValid`) VALUES
(1, 1, 1, '', 1),
(2, 1, 2, '', 1),
(3, 1, 3, '', 1),
(4, 1, 4, '', 1),
(5, 1, 5, '', 1),
(6, 1, 6, '', 1),
(7, 1, 7, '', 1),
(8, 1, 8, '', 1),
(9, 1, 9, '', 1),
(10, 1, 10, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `validasi_berkas_yudisium`
--

CREATE TABLE `validasi_berkas_yudisium` (
  `id_valid_yudisium` int(11) NOT NULL,
  `id_yudisium` int(11) NOT NULL,
  `id_berkas_yudisium` int(11) NOT NULL,
  `isValid` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_berkas_yudisium`
--

INSERT INTO `validasi_berkas_yudisium` (`id_valid_yudisium`, `id_yudisium`, `id_berkas_yudisium`, `isValid`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 1, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(2, 1, 2, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(3, 1, 3, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(4, 1, 4, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(5, 1, 5, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(6, 1, 6, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00'),
(7, 1, 7, 1, '2018-03-24 12:46:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `yudisium`
--

CREATE TABLE `yudisium` (
  `id_yudisium` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yudisium`
--

INSERT INTO `yudisium` (`id_yudisium`, `id_mahasiswa`, `id_periode`, `status`, `createdDtm`, `updatedDtm`) VALUES
(1, 1, 2, 'disetujui', '2018-03-24 12:45:08', '0000-00-00 00:00:00');

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
  ADD KEY `id_ta` (`id_ta`);

--
-- Indexes for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  ADD PRIMARY KEY (`id_pengajuan_ta_proyek`),
  ADD KEY `id_pengajuan` (`id_pengajuan_ta`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_sidang` (`id_sidang`),
  ADD KEY `peniaian_ibfk_3` (`id_dosen`);

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
  ADD KEY `id_dosen` (`id_dosen`),
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
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `anggota_sidang`
--
ALTER TABLE `anggota_sidang`
  MODIFY `id_anggota_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_komponen_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengajuan_ta`
--
ALTER TABLE `pengajuan_ta`
  MODIFY `id_pengajuan_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  MODIFY `id_pengajuan_ta_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `validasi_berkas_sidang`
--
ALTER TABLE `validasi_berkas_sidang`
  MODIFY `id_valid_sidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `validasi_berkas_yudisium`
--
ALTER TABLE `validasi_berkas_yudisium`
  MODIFY `id_valid_yudisium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `yudisium`
--
ALTER TABLE `yudisium`
  MODIFY `id_yudisium` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `pengajuan_ta_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tugas_akhir` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  ADD CONSTRAINT `pengajuan_ta_proyek_ibfk_1` FOREIGN KEY (`id_pengajuan_ta`) REFERENCES `pengajuan_ta` (`id_pengajuan_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ta_proyek_ibfk_2` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `sidang_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD CONSTRAINT `tugas_akhir_ibfk_5` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
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
