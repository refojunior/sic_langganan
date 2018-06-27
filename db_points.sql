-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2018 pada 04.54
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_points`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `kd_member` varchar(10) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `tempat_lhr` varchar(30) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `created` date NOT NULL,
  `stat` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kd_member`, `nama_lengkap`, `tempat_lhr`, `tgl_lhr`, `jk`, `alamat`, `no_telp`, `email`, `created`, `stat`) VALUES
('M001', 'Superman', 'dps', '2018-06-01', 'l', 'Jl. Dps', '0811111', 'Superman@email.id', '2018-06-25', 0),
('M002', 'Batman', 'nawd', '1998-08-08', 'l', 'awd', '12', 'awd@awd', '2018-05-26', 1),
('M003', 'WW', 'Denpasar', '1998-07-24', 'p', 'Jl. Mahendradatta', '8080', 'test@gmail.com', '2018-06-26', 1),
('M004', 'Membership', 'Denpasar', '1998-09-09', 'l', 'Jln. Members', '0812082', 'member@member.id', '2018-06-26', 1),
('M006', 'Roni Antara', 'Dps', '2000-09-09', 'l', 'Jl. Panjer', '08121012', 'email@email.com', '2018-06-26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `kd_member` varchar(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `nota` varchar(10) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `points`
--

INSERT INTO `points` (`id`, `kd_member`, `tgl`, `id_user`, `nominal`, `nota`, `point`) VALUES
(3, 'M004', '2018-06-26', 2, 50000, 'N004', 50),
(4, 'M002', '2018-06-26', 2, 30000, 'N002', 30),
(5, 'M002', '2018-06-25', 1, 30000, 'NOTA0001', 30),
(6, 'M004', '2018-06-27', 1, 150000, 'NOTA0002', 150),
(7, 'M003', '2018-06-27', 1, 300000, 'NOTA003', 300),
(8, 'M006', '2018-06-28', 1, 250000, 'NOTA006', 250);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `stat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `stat`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 1),
(2, 'operator', 'fe96dd39756ac41b74283a9292652d366d73931f', 'operator', 1),
(3, 'refo', '9009337cf16333f07109b593405cf7552ed8059a', 'admin', 1),
(4, 'om', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'operator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kd_member`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
