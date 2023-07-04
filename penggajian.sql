-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 10.42
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
(14, '1111', 26, 0, 4, '2023-06-01'),
(15, '7777', 30, 0, 5, '2023-06-01'),
(17, '9999', 25, 5, 1, '2023-06-01');

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
('GAJI001', '1111', '2023-06-01', 2500000, 0, 0, 2900000),
('GAJI002', '7777', '2023-06-01', 25000000, 0, 0, 27000000);

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
(2, 'OB', 1500000, 100000, 100000, 100000, 26, 1000, 50000),
(3, 'Kuli', 1200000, 100000, 50000, 100000, 26, 10000, 50000),
(5, 'Head Staff', 15000000, 2000000, 200000, 1000000, 30, 200000, 200000),
(6, 'Staff Marketing', 2500000, 1000000, 100000, 100000, 30, 50000, 50000);

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
('1111', 'maman', 'Laki-laki', 2, 'Brebes', '1996-02-02', 'test', 'sd', '089812371', 'Belum Nikah', 0),
('7777', 'abdul', 'Laki-laki', 5, 'cirebon', '1996-02-03', 'test', 's1', '08971263123', 'Belum Nikah', 0),
('9999', 'dewi', 'Perempuan', 6, 'losari', '1999-03-03', 'Jl. apa gatau', 's1', '0897616236', 'Belum Nikah', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` char(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', '2'),
(7, '123456', '14e1b600b1fd579f47433b88e8d85291', '3'),
(8, '1111', 'b59c67bf196a4758191e42f76670ceba', '3'),
(9, '7777', 'd79c8788088c2193f0244d8f1f36d2db', '3'),
(10, '9999', 'fa246d0262c3925617b0c72bb20eeb1d', '3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `fk_nip_1` (`nip`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `fk_nip_2` (`nip`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
