-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jun 2019 pada 10.43
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_eventku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(4) NOT NULL,
  `nama_event` varchar(80) DEFAULT NULL,
  `jenis_event` varchar(8) NOT NULL,
  `deadline` varchar(25) NOT NULL,
  `pelaksanaan` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tumbnail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `jenis_event`, `deadline`, `pelaksanaan`, `deskripsi`, `tumbnail`) VALUES
(11, 'LOMBA ESSAY SOSIOLOGI FAIR (SOSFAIR UNAND) 2019 ', '1', '2019-06-22', '2019-06-29', 'tema kegiatan : \r\n\"MILENIAL IN TECH : inovasi sosial era revolusi industri 4.0\" \r\n\r\nSubtema :\r\n. Rekayasa sosial \r\n. Teknologi \r\n. Pendidikan \r\n. Politik\r\n. Pariwisata\r\n. Ekonomi \r\n. Energi terbarukan \r\n\r\nHadiah perlombaan : \r\n*Juara 1 : Tropi + sertifikat + uang pembinaan \r\n*Juara 2 : Tropi + sertifikat + uang pembinaan \r\n*Juara 3 : Tropi + sertifikat + uang pembinaan \r\n*Esai Favorit: Sertifikat + uang pembinaan \r\n\r\nPersyaratan :\r\n1. Peserta merupakan mahasiswa aktif S1 atau Diploma perguruan tinggi negeri atau swasta di Indonesia dan masih berstatus mahasiswa.\r\n2. Peserta bersifat individual atau perorangan. \r\n3. Peserta boleh mengirimkan lebih dari satu karya dan dibayar sesuai dengan ketentuan. \r\n\r\nForm Pendaftaran : bit.ly/Sosfair2019 â° \r\n\r\nBiaya Pendaftaran :\r\nGelombang 1 : Rp. 50.000/karya\r\nGelombang 2 : Rp. 75.000/karya\r\nGelombang 3 : Rp. 100.000/karya \r\n\r\nPanduan Lomba dapat diunduh : bit.ly/Sosfair2019 \r\n\r\nAyoo tunggu apalagi daftarkan segera dirimu!! \r\nKami tunggu di ranah Minang\r\n\r\nnarahubung :\r\nPutri Mutia Firta ( 082386433265 )\r\nAnnisa Rahmah ( 0895601363496)\r\n\r\ninfo lainnya :\r\nIG : @Sosfair_unand\r\nEmail : sociologyfair@gmail.com\r\n\r\nOrganized by:\r\nHIMA SOSIOLOGI UNIVERSITAS ANDALAS', 'esssay.jpg'),
(12, 'Olimpiade Matematika ITS 2019', '1', '2019-06-27', '2019-06-26', '[ OPEN REGISTRATION OMITS ]\r\n\r\n\r\n\r\nHalo teman-teman!ðŸ‘‹\r\n\r\nOlimpiade yang kalian tunggu akhirnya datang juga.\r\n\r\n\r\n\r\nBagi kamu siswa SD/SMP/SMA yang penasaran dan tertantang untuk mengasah kemampuan kamu di Matematika, disini tempatnya!\r\n\r\n\r\n\r\nOMITS 2019 hadir kembali di 28 regional di seluruh Indonesia dengan hadiah jutaan rupiah. Cek poster untuk lebih jelasnya yaaa!! Yuk buruan daftar, apalagi yang ditunggu? Jangan lupa pesan buku kumpulan soal dan pembahasan dari omits tahun lalu untuk belajar ðŸ˜Š\r\n\r\n\r\n\r\nCatat waktunya nih!\r\n\r\nPendaftaran: 18 Mei 2019 - 27 Juli 2019\r\n\r\nLink Pendaftaran : bit.ly/daftarOMITS2019\r\n\r\nmasih bingung? \r\n\r\nZakky : 081252241411\r\n\r\nUbed : 085848250416\r\n\r\n\r\n\r\n #OMITS2019\r\n\r\n#MISSION4.0\r\n\r\n#Olimpiade?\r\n\r\n#YAOMITS! \r\n\r\n#OMITS13TH\r\n\r\n#MAGIC\r\n\r\n#UNLEASHTHEULTIMATESPELL\r\n\r\n#HIMATIKAITS\r\n\r\n#OLIMPIADEMATEMATIKA\r\n\r\n#ITSSURABAYA', 'olimpiade-matematika-its-2019.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(8) NOT NULL,
  `kategori` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Lomba'),
(2, 'Beasiswa'),
(3, 'Seminar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_user` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `tgl_lahir`, `jenis_user`) VALUES
(1, 'Reza Zulfan Azmi', 'azerliquid', '12345678', 'zarezazul@gmail.com', '1998-09-06', 'Admin'),
(2, 'Rizal Azky', 'rizalazky', 'Admin123', 'zal.azky@gmail.com', '1997-04-12', 'Admin'),
(3, 'Bilal Ghoni', 'bilal97', 'User1234', 'bilalgho@gmail.com', '1999-12-23', 'User'),
(5, 'Adrick Vadlamir Robick', 'admin123', 'admin123', 'rizalazky26@gmail.com', '2019-06-28', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
