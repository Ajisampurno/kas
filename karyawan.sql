-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 08:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `adminname` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `password`) VALUES
(202001, 'aji', '$2y$10$SSA1RIJC.oWbd4b55BXCjumxZwbbreBVqqARFuSIaQQ5O0MrRY/jW'),
(202003, 'coba', '$2y$10$lh1aDAgKzMxfwkDAyu9fbeLtiPKDlQhgp0FN1FpMvngNhFx6yboqi');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `telp` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `uang` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `telp`, `jabatan`, `status`, `gambar`, `uang`) VALUES
(21, 'Aji sampurno', '082142077185', 'staff', 'Lunas sampai dengan april', '1_eh0uOpuJPIlk-ufRWCYMJg.png', '40000'),
(22, 'fikri', '08241507777', 'spm', 'Lunas sampai dengan april', '6.jpg', '40000'),
(23, 'chusnul', '8214254522', 'spg', 'Lunas sampai dengan januari', '1.png', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `id` int(200) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `uang_keluar` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `alasan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`id`, `tgl`, `nama`, `uang_keluar`, `gambar`, `alasan`) VALUES
(49, '2020-04-03', 'aji', '10000', 'WhatsApp Image 2020-03-31 at 20.47.14.jpeg', 'refund');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(4, 'aji', '$2y$10$NsytFXq/3UqDqvPJrIJZeuOhJtZCCMCOkQIdYD.f9C7jTBSO3EoW2'),
(6, 'alo', '$2y$10$3UcP4vT.3P264A0Za7xS5OkRRW2D9sqRjjY/2BHWD/6c1AmawTzmm'),
(9, 'aji', '$2y$10$op8lsDOA8LLG04x0VlMB/uTndzkcoaccpBoDFNS.4lcvgcqHd0njq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202004;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reason`
--
ALTER TABLE `reason`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
