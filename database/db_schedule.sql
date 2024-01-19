-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2024 at 12:33 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` varchar(40) NOT NULL,
  `nama_bidang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama_bidang`, `created_at`, `updated_at`) VALUES
('0627251b-0e2f-4609-be16-b8abce89ff6c', 'UPTB Aset', '2023-01-05 19:13:22', '2023-01-05 17:53:53'),
('0af9a7e3-414d-11ee-b93c-244bfebc253d', 'SEKERTARIAT', '2023-08-22 16:35:49', '2023-08-22 16:35:49'),
('1f30e9ae-9f1a-4026-86d7-9384ae70241b', 'TU - (SEKERTARIAT)', '2023-01-05 17:53:28', '2023-01-11 21:17:59'),
('348e3315-b868-4eb1-8c1e-7f6d24857cca', 'PAMDAL', '2023-01-12 00:25:26', '2023-01-12 00:25:35'),
('454adcee-d791-40dc-adb5-bf4d029e7736', 'UPTB Perbendaharaan', '2023-01-05 17:53:46', '2023-01-05 17:58:03'),
('4805423b-8d94-4c42-ac73-2b71dbe7c843', 'Akuntansi', '2023-01-05 17:53:39', '2023-01-05 17:53:39'),
('5f187f13-c645-4ccd-b027-ac85e56e9f54', 'Arsip', '2023-01-05 17:53:48', '2023-01-05 17:53:48'),
('741b3b5a-2cf3-490a-b7d4-7fd8cffb2de8', 'BEKK', '2023-01-05 17:53:33', '2023-01-05 17:53:33'),
('79530810-bc72-4bcd-9d45-a9180151abf6', 'BMD', '2023-01-05 17:53:36', '2023-01-05 17:53:36'),
('988226b4-0cd4-4547-a218-25dd9c436520', 'Program - (SEKERTARIAT)', '2023-01-05 17:52:51', '2023-01-11 21:17:53'),
('a35a9250-06e4-4d2e-bb23-605e6642f165', 'Pimpinan', '2023-01-05 18:45:52', '2023-01-05 18:45:52'),
('c639a8a5-9159-4c17-9b59-427865c6b4ed', 'Lainnya', '2023-01-12 00:25:39', '2023-01-12 00:25:39'),
('e2c0325b-1ecb-453d-992a-37ddfeaff82d', 'Anggaran', '2023-01-05 17:53:43', '2023-01-05 17:53:43'),
('f60b5439-5d63-4c1e-8f28-9e4940619244', 'Keuangan - (SEKERTARIAT)', '2023-01-05 17:53:25', '2023-01-11 21:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` varchar(40) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` varchar(40) NOT NULL,
  `kegiatan_id` varchar(40) NOT NULL,
  `tahun_id` varchar(40) NOT NULL,
  `waktu_mulai` varchar(25) NOT NULL,
  `waktu_berakhir` varchar(25) NOT NULL,
  `bidang_id` varchar(40) NOT NULL,
  `users_id` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` varchar(40) NOT NULL,
  `tahun` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `bidang_id` varchar(40) NOT NULL,
  `rule` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `bidang_id`, `rule`, `created_at`, `updated_at`) VALUES
('990a318a-b355-11ee-9878-244bfebc253d', 'Admin BPKAD', 'admin', '$2y$12$JSXx3SF/HT0WLpdRtvc5seqjBXqZ0osaqLn6IYmm7KYP43IYfvRhO', '454adcee-d791-40dc-adb5-bf4d029e7736', 'admin', '2024-01-15 03:24:04', NULL),
('b3985875-b355-11ee-9878-244bfebc253d', 'users', 'users', '$2y$12$zsllmiuLUtQrRbftZq8/2O4XJXd0b9PgFHHej2AyoqbgnNJPtilwa', '79530810-bc72-4bcd-9d45-a9180151abf6', 'users', '2024-01-15 03:24:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_id` (`kegiatan_id`),
  ADD KEY `tahun_id` (`tahun_id`),
  ADD KEY `bidang_id` (`bidang_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`tahun_id`) REFERENCES `tahun` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
