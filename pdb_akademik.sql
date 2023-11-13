-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 02:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdb_akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama`, `alamat`, `jabatan`) VALUES
('0001', 'Afdhol Dzikri, S.ST., M.T', 'Batu Aji', 'Dosen IF'),
('0002', 'Hilda Widyastuti, S.T., M.T', 'Botania', 'Dosen IF M'),
('0003', 'Sartikha, S.ST., M.Eng', 'Batam Center', 'Dosen IF'),
('0004', 'Sudra Irawan, S.Pd.Si., M.Sc', 'Bengkong', 'Kepala Prodi IF');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` int(11) NOT NULL,
  `kode_matkul` char(10) NOT NULL,
  `nidn` char(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `kelas_mhs` varchar(30) NOT NULL,
  `matkul` varchar(30) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `ruang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kuliah`
--

INSERT INTO `jadwal_kuliah` (`id`, `kode_matkul`, `nidn`, `hari`, `kelas_mhs`, `matkul`, `jam`, `tgl`, `ruang`) VALUES
(5, 'IF210', '0001', 'RABU', 'REKS3A PAGI', 'PPL', '10:30 - 12:00 WIB', '2023-12-01', 'TA 11.5'),
(7, 'TRPL101', '0001', 'RABU', 'TRPL 3E PAGI', 'Dasar Pemrograman Web', '07:00 - 09:00 WIB', '2023-11-24', 'FTR 4.2'),
(8, 'TRPL101', '0003', 'SENIN', 'IF3A PAGI', 'Matematika', '07:00 - 09:00 WIB', '2023-11-16', 'Online'),
(9, 'IF103', '0003', 'SENIN', 'IF3A PAGI', 'Matematika', '18:00 - 21:00 WIB', '2023-11-13', 'TA 11.9'),
(10, 'IF210', '0002', 'SELASA', 'IF5A PAGI', 'PPL', '18:00 - 21:00 WIB', '2023-11-13', 'TA 11.9');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jurusan`) VALUES
('1010', 'Rysha Nidya', 'Batam, Punggur', 'Rekayasa Perangkat Lunak'),
('22354', 'Haadi Rahman Yusran', 'Batam, Botania', 'Teknik Informatika'),
('3312301053', 'Yurisha Anindya SE', 'Bengkong Laut', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nik` char(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bagian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nik`, `nama`, `bagian`) VALUES
('1', 'Matheus Maruli, S.Tr.Akun', 'Laboran '),
('112233', 'Tiara, S.Tr.Akun', 'Laboran MB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nidn` (`nidn`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
