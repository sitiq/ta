-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2018 at 01:47 PM
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
  `email` varchar(128) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `skill` text NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ketua` varchar(128) NOT NULL,
  `sekretaris` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kaprodi`
--

CREATE TABLE `kaprodi` (
  `id_kaprodi` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nid` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(15) NOT NULL,
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
(1, 'Tata Bahasa', 0, '2018-03-05 15:03:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id_komponen_nilai` int(11) NOT NULL,
  `id_komponen` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `foto` varchar(255) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `ipk` decimal(3,2) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `skill` text NOT NULL,
  `pengalaman` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `foto`, `jumlah_sks`, `ipk`, `email`, `mobile`, `skill`, `pengalaman`, `id_user`, `createdDtm`, `updatedDtm`) VALUES
(1, '15/384470/SV/08827', 'Havil Wintas Ernanda', 'z.jpg', 107, '3.80', 'lorem@gmail.com', '085719320391', 'Makan,Tidur,Mandi', 'Banyak', 3, '2018-03-07 11:50:28', '2018-03-16 07:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ta`
--

CREATE TABLE `pengajuan_ta` (
  `id_pengajuan` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_periode_ta` int(11) NOT NULL,
  `id_pengajuan_ta_proyek` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ta_proyek`
--

CREATE TABLE `pengajuan_ta_proyek` (
  `id_pengajuan_ta_proyek` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `nilai_akhir_dosen` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode_ta`
--

CREATE TABLE `periode_ta` (
  `id_periode_ta` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode_yudisium`
--

CREATE TABLE `periode_yudisium` (
  `id_periode_yudisium` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tangga_akhir` datetime NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(255) NOT NULL,
  `id_ta` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL,
  `file` varchar(255) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `klien` varchar(255) DEFAULT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sidang`
--

CREATE TABLE `sidang` (
  `id_sidang` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `nilai_akhir_sidang` int(11) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_akhir`
--

CREATE TABLE `tugas_akhir` (
  `id_ta` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `status_pengambilan` enum('baru','perpanjangan') NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_periode_ta` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 'akademik', 'akademik', 'Ningrum', 0, '2018-03-07 11:46:58', '2018-03-14 10:14:10'),
(2, 3, 'dosen', 'dosen', 'Irkham', 0, '2018-03-07 11:48:07', '2018-03-14 10:14:13'),
(3, 4, 'mahasiswa', 'mahasiswa', 'Havil Wintas E', 0, '2018-03-07 11:48:07', '2018-03-14 10:14:16'),
(4, 1, 'kaprodi', 'kaprodi', 'Muh. Fakrurifqi', 0, '2018-03-14 17:10:46', '2018-03-14 10:14:27');

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
-- Table structure for table `validasi_berkas_sidang`
--

CREATE TABLE `validasi_berkas_sidang` (
  `id_valid_sidang` int(11) NOT NULL,
  `id_sidang` int(11) NOT NULL,
  `id_berkas_sidang` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `isValid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `validasi_berkas_yudisium`
--

CREATE TABLE `validasi_berkas_yudisium` (
  `id_valid_yudisium` int(11) NOT NULL,
  `id_yudisium` int(11) NOT NULL,
  `id_berkas_yudisium` int(11) NOT NULL,
  `isValid` tinyint(4) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `yudisium`
--

CREATE TABLE `yudisium` (
  `id_yudisium` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_periode_yudisium` int(11) NOT NULL,
  `status` enum('disetujui','pending','ditolak') NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedDtm` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_periode_ta` (`id_periode_ta`);

--
-- Indexes for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  ADD PRIMARY KEY (`id_pengajuan_ta_proyek`),
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_sidang` (`id_sidang`),
  ADD KEY `peniaian_ibfk_3` (`id_dosen`);

--
-- Indexes for table `periode_ta`
--
ALTER TABLE `periode_ta`
  ADD PRIMARY KEY (`id_periode_ta`);

--
-- Indexes for table `periode_yudisium`
--
ALTER TABLE `periode_yudisium`
  ADD PRIMARY KEY (`id_periode_yudisium`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`),
  ADD KEY `id_ta` (`id_ta`);

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
  ADD KEY `id_proposal` (`id_proposal`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD PRIMARY KEY (`id_ta`),
  ADD KEY `id_proyek` (`id_proyek`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_periode_ta` (`id_periode_ta`);

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
  ADD KEY `id_periode_yudisium` (`id_periode_yudisium`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berkas_sidang`
--
ALTER TABLE `berkas_sidang`
  MODIFY `id_berkas_sidang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berkas_yudisium`
--
ALTER TABLE `berkas_yudisium`
  MODIFY `id_berkas_yudisium` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadwal_sidang`
--
ALTER TABLE `jadwal_sidang`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kaprodi`
--
ALTER TABLE `kaprodi`
  MODIFY `id_kaprodi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  MODIFY `id_komponen_nilai` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengajuan_ta`
--
ALTER TABLE `pengajuan_ta`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  MODIFY `id_pengajuan_ta_proyek` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periode_ta`
--
ALTER TABLE `periode_ta`
  MODIFY `id_periode_ta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periode_yudisium`
--
ALTER TABLE `periode_yudisium`
  MODIFY `id_periode_yudisium` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sidang`
--
ALTER TABLE `sidang`
  MODIFY `id_sidang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `validasi_berkas_sidang`
--
ALTER TABLE `validasi_berkas_sidang`
  MODIFY `id_valid_sidang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `validasi_berkas_yudisium`
--
ALTER TABLE `validasi_berkas_yudisium`
  MODIFY `id_valid_yudisium` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `yudisium`
--
ALTER TABLE `yudisium`
  MODIFY `id_yudisium` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `akademik`
--
ALTER TABLE `akademik`
  ADD CONSTRAINT `akademik_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `pengajuan_ta_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ta_ibfk_4` FOREIGN KEY (`id_periode_ta`) REFERENCES `periode_ta` (`id_periode_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_ta_proyek`
--
ALTER TABLE `pengajuan_ta_proyek`
  ADD CONSTRAINT `pengajuan_ta_proyek_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_ta` (`id_pengajuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_ta_proyek_ibfk_2` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_sidang`) REFERENCES `sidang` (`id_sidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`id_ta`) REFERENCES `tugas_akhir` (`id_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `proyek_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sidang`
--
ALTER TABLE `sidang`
  ADD CONSTRAINT `sidang_ibfk_1` FOREIGN KEY (`id_proposal`) REFERENCES `proposal` (`id_proposal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sidang_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas_akhir`
--
ALTER TABLE `tugas_akhir`
  ADD CONSTRAINT `tugas_akhir_ibfk_4` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_akhir_ibfk_5` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_akhir_ibfk_6` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_akhir_ibfk_7` FOREIGN KEY (`id_periode_ta`) REFERENCES `periode_ta` (`id_periode_ta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `yudisium_ibfk_3` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `yudisium_ibfk_4` FOREIGN KEY (`id_periode_yudisium`) REFERENCES `periode_yudisium` (`id_periode_yudisium`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
