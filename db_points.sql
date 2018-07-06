-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jul 2018 pada 08.43
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
-- Struktur dari tabel `hadiah`
--

CREATE TABLE `hadiah` (
  `kd_hadiah` varchar(10) NOT NULL,
  `nama_hadiah` varchar(200) NOT NULL,
  `ketentuan_poin` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hadiah`
--

INSERT INTO `hadiah` (`kd_hadiah`, `nama_hadiah`, `ketentuan_poin`, `stok`, `stat`) VALUES
('B001', 'Boneka Teddy Bear', 50, 8, 1),
('B002', 'Boneka Unicorn', 150, 7, 1),
('B003', 'Skin Superman Godfall', 300, 6, 1),
('H0008', 'Kaos Supreme', 1500, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `kd_member` varchar(10) NOT NULL,
  `dapat_tukar` enum('1','0') NOT NULL,
  `value` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `kd_member`, `dapat_tukar`, `value`, `tanggal`, `ket`) VALUES
(1, 'M002', '1', 350, '2018-07-05', 'NA01'),
(2, 'M002', '0', 100, '2018-07-06', 'B001'),
(3, 'M002', '1', 750, '2018-07-07', 'N0A2'),
(4, 'M003', '1', 100, '2018-07-06', 'N0W1'),
(5, 'M003', '1', 350, '2018-07-06', 'N0W2'),
(6, 'M002', '0', 150, '2018-07-08', 'B002'),
(7, 'M004', '1', 1000, '2018-07-06', 'NOZ1'),
(8, 'M012', '1', 950, '2018-07-06', 'N0S1');

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
('M002', 'Ayang', 'nawd', '1998-08-08', 'l', 'awd', '12', 'awd@awd', '2018-05-26', 1),
('M003', 'Wonder', 'Denpasar', '1998-07-24', 'p', 'Jl. Mahendradatta', '8080', 'test@gmail.com', '2018-06-26', 1),
('M004', 'Zephys', 'Denpasar', '1998-09-09', 'l', 'Jln. Members', '0812082', 'member@member.id', '2018-06-26', 1),
('M006', 'Roni Antara', 'Dps', '2000-09-09', 'l', 'Jl. Panjer', '08121012', 'email@email.com', '2018-06-26', 1),
('M010', 'Junior', 'Denpasar', '2017-03-05', 'l', 'Jl. Anywhere', '08111801081', 'Junior@mail.com', '2018-07-05', 1),
('M011', 'YUI', 'Fukuoka', '1990-07-03', 'p', 'Jl. Fukuoka Japan', '081232123', 'yui@flowerflower.com', '2018-07-06', 1),
('M012', 'SACCAN', 'Japan', '1989-07-08', 'l', 'Japanese', '08332123', 'saccan@flowerflower.com', '2018-07-06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `points`
--

CREATE TABLE `points` (
  `kd_member` varchar(11) NOT NULL,
  `jumlah_poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `points`
--

INSERT INTO `points` (`kd_member`, `jumlah_poin`) VALUES
('M002', 850),
('M003', 450),
('M004', 1000),
('M012', 950);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_penukaran`
--

CREATE TABLE `trans_penukaran` (
  `kd_tukar` int(11) NOT NULL,
  `kd_member` varchar(11) NOT NULL,
  `kd_hadiah` varchar(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_penukaran`
--

INSERT INTO `trans_penukaran` (`kd_tukar`, `kd_member`, `kd_hadiah`, `jml`, `tgl`, `id_user`) VALUES
(1, 'M002', 'B001', 2, '2018-07-06', 1),
(2, 'M002', 'B002', 1, '2018-07-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_points`
--

CREATE TABLE `trans_points` (
  `id` int(11) NOT NULL,
  `kd_member` varchar(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `nota` varchar(10) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_points`
--

INSERT INTO `trans_points` (`id`, `kd_member`, `tgl`, `id_user`, `nominal`, `nota`, `point`) VALUES
(1, 'M002', '2018-07-05', 1, 350000, 'NA01', 350),
(2, 'M002', '2018-07-07', 1, 750000, 'N0A2', 750),
(3, 'M003', '2018-07-06', 1, 100000, 'N0W1', 100),
(4, 'M003', '2018-07-06', 1, 350000, 'N0W2', 350),
(5, 'M004', '2018-07-06', 1, 1000000, 'NOZ1', 1000),
(6, 'M012', '2018-07-06', 1, 950000, 'N0S1', 950);

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
-- Indexes for table `hadiah`
--
ALTER TABLE `hadiah`
  ADD PRIMARY KEY (`kd_hadiah`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kd_member`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD UNIQUE KEY `id_member` (`kd_member`);

--
-- Indexes for table `trans_penukaran`
--
ALTER TABLE `trans_penukaran`
  ADD PRIMARY KEY (`kd_tukar`);

--
-- Indexes for table `trans_points`
--
ALTER TABLE `trans_points`
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
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trans_penukaran`
--
ALTER TABLE `trans_penukaran`
  MODIFY `kd_tukar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trans_points`
--
ALTER TABLE `trans_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
