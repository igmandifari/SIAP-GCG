-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 02:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siap-gcg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aoi`
--

CREATE TABLE `tbl_aoi` (
  `id` int(11) NOT NULL,
  `nama_aoi` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asesor`
--

CREATE TABLE `tbl_asesor` (
  `id` int(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `foto` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_asesor`
--

INSERT INTO `tbl_asesor` (`id`, `nama_user`, `username`, `password`, `departemen`, `role`, `ket`, `foto`) VALUES
(1, 'admin', 'admin', '$2y$10$2RPp5rN054p2WjKALGNwXutk1Tog81asXufZmU.sLvLHaNDYcikUS', 'sdm lingkungan', 'admin', 'pic', 0x64656661756c745f70726f66696c652e6a7067),
(6, 'rizki', 'rizki', '$2y$10$3evMGmkh0wHMbLE8FUkNde0g.ufGhbDQADBJnWB1sybkVB6mKdq1.', 'manusia', 'user', 'pic', NULL),
(10, 'user', 'user', '$2y$10$uBevA15YX4qBcQBeN5Yvmef4auRzQlNpWSYU0eF4BzviwIIyPgYyW', 'as', 'user', 'as', NULL),
(11, 'user2', 'user2', '$2y$10$lHXVd6XK0o1oFSA0fFPAgO1udeFYbgyItPJGgZ1XKXKWFQrlfjrs6', 'asd', 'user', 'asdw', 0x34783620612e6a7067),
(12, 'user3', 'user3', '$2y$10$Lk4PvL.QmUAoNJsQWT2Dd.w7WEA67n04JYpzIWQbprBp17GOF0Tqq', 'instagram man', 'user', 'pic', 0x34783620612e6a7067),
(13, 'user4', 'user4', '$2y$10$xYd1wsMVQ3QdO8XfDKI3neCc5j7/mTeUO1kZ8ESGlE9qJspLLkRJO', 'manusia', 'user', 'pic', 0x2e2e2f6173736574732f696d672f363463383963373031316432385f34783620612e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evidence`
--

CREATE TABLE `tbl_evidence` (
  `id` int(11) NOT NULL,
  `nama_evidence` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aoi`
--
ALTER TABLE `tbl_aoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_asesor`
--
ALTER TABLE `tbl_asesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_evidence`
--
ALTER TABLE `tbl_evidence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_aoi`
--
ALTER TABLE `tbl_aoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_asesor`
--
ALTER TABLE `tbl_asesor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_evidence`
--
ALTER TABLE `tbl_evidence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
