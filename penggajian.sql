-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Agu 2018 pada 07.04
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(11) NOT NULL,
  `nip` char(12) NOT NULL,
  `masuk` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `nip`, `masuk`, `izin`, `jam_lembur`, `periode`) VALUES
(5, '123', 1, 1, 1, '2018-08-01'),
(6, '123', 1, 1, 1, '2018-09-01'),
(7, '123', 26, 0, 0, '2018-10-01'),
(8, '777', 24, 2, 4, '2018-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` char(11) NOT NULL,
  `nip` char(12) NOT NULL,
  `periode` date NOT NULL,
  `gaji_pokok_edit` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `bayar_kasbon` int(11) NOT NULL,
  `jumlah_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id_gaji`, `nip`, `periode`, `gaji_pokok_edit`, `bonus`, `bayar_kasbon`, `jumlah_gaji`) VALUES
('GAJI001', '123', '2018-08-01', 1000000, 0, 0, -151000),
('GAJI002', '123', '2018-09-01', 1000000, 0, 0, -151000),
('GAJI003', '123', '2018-10-01', 1000000, 0, 0, 1000000),
('GAJI004', '777', '2018-08-01', 1000000, 0, 90000, 1397000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` char(25) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan_jabatan` int(11) NOT NULL,
  `uang_lembur` int(11) NOT NULL,
  `jamsostek` int(11) NOT NULL,
  `hari_kerja` int(11) NOT NULL,
  `potongan_ijin` int(11) NOT NULL,
  `potongan_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`, `gaji_pokok`, `tunjangan_jabatan`, `uang_lembur`, `jamsostek`, `hari_kerja`, `potongan_ijin`, `potongan_absen`) VALUES
(2, 'OB', 1000000, 100000, 100000, 100000, 26, 1000, 50000),
(3, 'Kuli', 1200000, 100000, 50000, 100000, 26, 10000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` char(12) NOT NULL,
  `nama` char(100) NOT NULL,
  `kelamin` char(25) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tempat_lahir` char(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan_terakhir` char(25) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `status` char(25) NOT NULL,
  `kasbon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `kelamin`, `id_jabatan`, `tempat_lahir`, `tgl_lahir`, `alamat`, `pendidikan_terakhir`, `no_hp`, `status`, `kasbon`) VALUES
('123', 'Sad', 'Laki-laki', 2, 'Cirebon', '2018-08-08', 'Jalan', 'SMP', '911', 'Nikah', 0),
('777', 'hhh', 'Laki-laki', 2, 'Cirebon', '2000-08-09', 'llll', 'sma', '098887', 'Belum Nikah', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(25) NOT NULL,
  `password` char(255) NOT NULL,
  `level` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', '2'),
(3, '123', '7363a0d0604902af7b70b271a0b96480', '3'),
(4, '777', '74be16979710d4c4e7c6647856088456', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `fk_nip_1` (`nip`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `fk_nip_2` (`nip`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_jabatan` (`id_jabatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `fk_nip_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `fk_nip_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
