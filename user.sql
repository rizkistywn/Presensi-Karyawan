-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 05:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pegawai` int(11) NOT NULL,
  `nama_lengkap` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `image` varchar(125) NOT NULL,
  `qr_code_image` varchar(125) NOT NULL,
  `kode_pegawai` varchar(125) NOT NULL,
  `instansi` varchar(125) NOT NULL,
  `jabatan` varchar(125) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `tgl_lahir` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `bagian_shift` int(11) NOT NULL,
  `laptop_mac_address` varchar(32) NOT NULL,
  `hp_mac_address` varchar(32) NOT NULL,
  `is_active` int(1) NOT NULL,
  `qr_code_use` int(2) NOT NULL,
  `last_login` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pegawai`, `nama_lengkap`, `username`, `password`, `role_id`, `umur`, `image`, `qr_code_image`, `kode_pegawai`, `instansi`, `jabatan`, `npwp`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `bagian_shift`, `laptop_mac_address`, `hp_mac_address`, `is_active`, `qr_code_use`, `last_login`, `date_created`) VALUES
(12, 'Admin', 'admin', '$2y$10$QcvsVSAy0iz8coxJnfVoPOBLjZD6McUaSJQjJV7V/M7m8mzsBvSxm', 1, 18, '2c4732c73fb1fd927beeb74fc85a9c54.png', 'qr_code_293571010111.png', '293571010111', 'PT. Cipta Esensi Merenah', 'Administrator', 'Tidak Ada', '1995-10-08', 'Bandung', 'Laki - Laki', 1, '', '', 1, 1, 1714227434, 1584698797),
(43, 'Vanny', 'vanny', '$2y$10$LsTeiNP4uWHRkgXAHYGVrOU8nrM9VZ2YQsAst6rir1raLTRzuCXqS', 1, 25, '604fecdf658397e59f7fd631f0f46c5d.png', 'qr_code_343791884702506.png', '343791884702506', 'PT. Cipta Esensi Merenah', 'Administrator', 'Tidak Ada', '1997-12-08', 'Bandung', 'Perempuan', 1, '', '', 1, 1, 0, 1709215005),
(44, 'Rizki Setiyawan', 'rizki', '$2y$10$iPOZ5YjXWNv8JhLaZd.VRuPlO1aTbmRS9RneQWIhu6.c1BquVMCES', 3, 21, 'default.png', 'qr_code_015148865349236.png', '015148865349236', 'PT. Cipta Esensi Merenah', 'Magang', 'Tidak Ada', '2003-12-01', 'Bandung', 'Laki - Laki', 2, '', '', 1, 1, 1714228191, 1709215060),
(45, 'Rully', 'rully', '$2y$10$wRWTAtbby.HUaovQXINIXO.2uYYsLBWessqDrFJ9L.BXqmEJ0iwL6', 3, 23, 'default.png', 'qr_code_453098852669413.png', '453098852669413', 'PT. Cipta Esensi Merenah', 'Pegawai', 'Tidak Ada', '2000-12-08', 'Bandung', 'Laki - Laki', 1, '', '', 1, 1, 0, 1709215128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
