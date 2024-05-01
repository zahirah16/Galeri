-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2024 pada 06.46
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `nama_album` varchar(200) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `nama_album`, `deskripsi`, `tanggal_dibuat`, `user_id`) VALUES
(1, 'Keluarga', 'ini adalah foto keluarga bersama sama.', '2024-04-14 03:37:26', 2),
(3, 'Hewan', NULL, '2024-04-15 03:09:15', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `judul_foto` varchar(200) DEFAULT NULL,
  `deskripsi_foto` text DEFAULT NULL,
  `tanggal_unggah` timestamp NULL DEFAULT current_timestamp(),
  `lokasi_file` varchar(200) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `judul_foto`, `deskripsi_foto`, `tanggal_unggah`, `lokasi_file`, `album_id`, `user_id`) VALUES
(5, 'Foto Keluarga Saya', 'Ketika itu sedang foto di studio rembang', '2024-04-14 06:49:28', 'foto_galeri/1713077368_fotokeluaurga.jpg', 1, 2),
(6, 'Jerapah', 'Jerapah adalah hewan dengan leher terpanjang', '2024-04-15 02:45:12', 'foto_galeri/1713149112_jerapah.jpeg', 3, 3),
(7, 'Alpard', 'mobil impian', '2024-04-15 03:11:54', 'foto_galeri/1713150714_alpad.jpeg', NULL, 3),
(8, 'Harimau', 'hewan buas', '2024-04-15 03:13:57', 'foto_galeri/1713150837_harimau.jpg', NULL, 3),
(9, 'Hotel Jogja', 'hotem nyaman', '2024-04-15 03:14:51', 'foto_galeri/1713150891_hotel jogja.jpg', NULL, 2),
(10, 'Candi Borobudur', 'Salah satu keajaiban dunia', '2024-04-15 03:19:06', 'foto_galeri/1713151146_borobudur.jpg', NULL, 2),
(11, 'Pajero', 'Mobil SUV', '2024-04-15 03:20:32', 'foto_galeri/1713151232_pajero.jpg', NULL, 3),
(12, 'Pantai', 'Sejuk', '2024-04-15 03:23:02', 'foto_galeri/1713151382_pantai.jpg', NULL, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `id` int(11) NOT NULL,
  `foto_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar_foto`
--

INSERT INTO `komentar_foto` (`id`, `foto_id`, `user_id`, `isi_komentar`, `tanggal_komentar`) VALUES
(2, 5, 2, 'Foto ini menggambarkan keluarga yang sakinah, mawaddah warrohmah', '2024-04-14 13:20:38'),
(3, 5, 2, 'terlalu mudah', '2024-04-14 13:22:36'),
(4, 7, 3, 'mobilnya keren ini mah', '2024-04-15 03:26:37'),
(5, 6, 3, 'Lehernya panjang banget si', '2024-04-15 03:37:32'),
(6, 11, 3, 'ok', '2024-04-15 03:39:32'),
(7, 10, 3, 'lhah ok', '2024-04-15 04:03:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_foto`
--

CREATE TABLE `like_foto` (
  `id` int(11) NOT NULL,
  `foto_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_like` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `like_foto`
--

INSERT INTO `like_foto` (`id`, `foto_id`, `user_id`, `tanggal_like`) VALUES
(3, 6, 3, '2024-04-15 04:02:09'),
(4, 10, 3, '2024-04-15 04:02:49'),
(5, 11, 3, '2024-04-15 04:03:10'),
(6, 5, 3, '2024-04-15 04:03:18'),
(7, 7, 3, '2024-04-15 04:40:01'),
(8, 7, 2, '2024-04-15 04:40:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `nama_lengkap`, `alamat`) VALUES
(1, 'coba', '$2y$10$lsmyRUVM.fdzDmkkXi4fju3pfe095nAjY256tY97pNrN/oudCXNJi', 'galeri@gmail.com', 'galeri baru', 'gedangan rembang'),
(2, 'farhan', '$2y$10$X8O99HpGy5QMa3I2getDq.F0xyq4xZmN8H3tOqAGrhUHZtdeBPKfy', 'farhan@gmail.com', 'Farhan Abidin', 'Jawa Tengah'),
(3, 'abidin', '$2y$10$KgAy8VJpScd46fu97IWurOrfbnYb.I6SRAQ/RoFX5zayd6IP2rp0q', 'zaenalote2017@gmail.com', 'Rohmat Zaenal Abidin', 'Desa Bitingan, Kec Sale, Kab Rembang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `like_foto`
--
ALTER TABLE `like_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `like_foto`
--
ALTER TABLE `like_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
