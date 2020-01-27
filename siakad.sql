-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2020 pada 20.33
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `nim` int(8) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nama`, `nim`, `tgl_lahir`, `jurusan`, `alamat`, `email`, `no_telp`, `foto`) VALUES
(1, 'Ahmad Aula Syakbana', 17030, '2020-01-01', 'Rekayasa Perangkat Lunak', 'Sarang', 'Ahmadaulasyakbana@gmail.com', '089765123213', '0'),
(2, 'Ahmad Deni Prasetyo', 17031, '2020-01-02', 'Multimedia', 'tulung', 'Ahmaddeniprasetyo@gmail.com', '082321321432', '0'),
(3, 'Ahmad Khoirudin', 17032, '2020-01-03', 'Tekhnik Bisnis Sepeda Montor', 'Sarang', 'Ahmadkhoirudin@gmail.com', '085652321321', '0'),
(4, 'Ahmad Kobek', 17033, '2020-01-04', 'Rekayasa Perangkat Lunak', 'Punjulharjo', 'Ahmadkohar@gmail.com', '087213456764', '0'),
(5, 'Ahmad Mishbakhud Diyarrr', 17034, '2020-01-05', 'Rekayasa Perangkat Lunak', 'Ngemplak', 'Ahmadmishbakhuddiyarrrr@gmail.com', '082328290399', 'BillGatesHeadshot.jpg'),
(6, 'Ahmad Asrohi Wicanarko', 17035, '2020-01-06', 'Tehknik Komputer Jaringan', 'Salatiga', 'Ahmadasrohiwicanarko@gmail.com', '087654123123', '230px-Roronoa_Zoro.jpg'),
(8, 'Chusfiandi Ainun Farid', 17037, '2020-01-14', 'Tehknik Bisnis Sepeda Montor', 'Sumbergirang', 'Chusfiandiainunfarid@gmail.com', '082765123123', '310307.jpg'),
(9, 'Ahmad Faizul Ibaddd', 17010, '2020-01-21', 'Rekayasa Perangkat Lunak', 'Saranggg', 'Ahmadfaizulibad@gmail.com', '086542123111', 'slide1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
