-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2024 pada 17.57
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_dosen` varchar(10) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status_dosen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_user`, `kode_dosen`, `nama_dosen`, `tgl_lahir`, `no_telp`, `status_dosen`) VALUES
(1, 2, 'DSN0001', 'Maliki', '1995-01-11', '02823823648', 1),
(2, 0, '932', 'asa', '2024-07-12', '9271', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_hadir` int(11) NOT NULL,
  `tgl_hadir` date NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `absensi` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`id_hadir`, `tgl_hadir`, `id_matkul`, `id_user`, `absensi`, `catatan`) VALUES
(11, '2024-07-12', 2, 2, 'Tidak Hadir', 'tugas'),
(12, '2024-07-12', 1, 3, 'Hadir', 'Maaf saya sedikit telat'),
(13, '2024-07-13', 7, 4, 'Tidak Hadir', 'Kerjakan tugas pada ppt yang sudah diberikan pada pertemuan sebelumnya. Kirim ke WA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` int(2) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `id_user`, `nama_matkul`, `sks`, `semester`) VALUES
(1, 3, 'Trading', 2, 4),
(4, 0, 'test', 3, 5),
(6, 3, 'Pemrograman 1', 3, 1),
(7, 4, 'Fisika', 2, 5),
(8, 2, 'Pancasila', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hak_akses` int(2) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status` int(1) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `hak_akses`, `kode`, `alamat`, `no_telp`, `status`, `name`) VALUES
(1, 'Admin', '$2y$10$fLBcQedY0Bg9L65H02irfO.rajVdCKLbMDaSTdfeNI29nSly0efYW', 'admin@gmail.com', 1, 'ADM001', 'pasir', '0817236682', 1, 'Admin'),
(2, 'Malik', '$2y$10$DylWcoU6uwGWBkkdoJQnn.2s19mJ/0bWCHbWZib8HoZ3.5jPlolLW', 'mlk@gmail.com', 2, 'DSN0001', 'tenjo', '012938974823', 1, 'Malik Zea, M.Pd.'),
(3, 'Asa', '$2y$10$VgqRW2Rea4rGr81MXMS6huO4XoQt4EX6rKzffLvm4O2jmAk5I6adq', 'asa@gmail.com', 2, 'DSN0002', 'cibadak', '0128378734', 1, 'Asha, M.Kom'),
(4, 'Alex', '$2y$10$Bzect.9xUP.q7QcFz1DiReilsObqrhPKFU49jppgLftPxjMbVw6I6', 'alx@gmail.com', 2, 'DSN0003', 'Cikande', '082823649444', 1, 'Alex Doe, S.T.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_hadir`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_hadir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
