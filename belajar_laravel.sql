-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2020 pada 08.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(50) NOT NULL,
  `pegawai_jabatan` varchar(20) NOT NULL,
  `pegawai_alamat` text NOT NULL,
  `pegawai_gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `pegawai_jabatan`, `pegawai_alamat`, `pegawai_gambar`) VALUES
(2, 'fransen', 'Instruktur', 'Pesanggrahan', ''),
(3, 'bulindaaaaaa', 'Ibu RT RW', 'sepanjang jalan kenanagan', '1603193952.jpg'),
(6, 'Jokowi Dodo', 'presiden', 'istana bgr', '1603174248.jpeg'),
(7, 'andi', 'admni', 'jalan ini', '1602916254.jpeg'),
(8, 'erickthohir', 'men bumn', 'kemenbumn', '1603170318.jpeg'),
(9, 'Ganjar PRanowo', 'Gub jateng', 'semarang jawa tengah', '1604118531.jpeg'),
(10, 'Ganjar PRanowo', 'Gub jateng', 'semarang jawa tengah', '1604118698.jpeg'),
(11, 'maudyyyy', 'inii', 'jakartaaa', '1604118743.jpeg'),
(12, 'maudyyyydd', 'tessss', 'sini', '1604119053.jpeg'),
(13, 'Mario', 'Kang wifi', 'depok', '1604119985.jpeg'),
(14, 'Kang emil', 'gub jabar', 'jakartaa', '1604120341.jpeg'),
(15, 'iniii', 'aaa', 'sdawe', '1604120575.jpeg'),
(16, 'risma', 'walikota', 'surabya', '1604125123.jpeg'),
(17, 'risma', 'walikota', 'surabya', '1604125334.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
