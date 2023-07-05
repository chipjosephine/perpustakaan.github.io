-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2023 pada 01.15
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan2.0`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gabung` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `ttl`, `jenkel`, `prodi`, `fakultas`, `tahun_masuk`, `no_telp`, `email`, `username`, `password`, `gabung`) VALUES
(201931216, 'Josephine', 'Demak, 12 April 2001', 'Perempuan', 'S1 Pendidikan Kristen Anak Usia Dini', 'Fakultas Keguruan dan Ilmu Pendidikan Kristen', 2019, '083150038356', 'charisjosephine@gmail.com', 'charisjosephine', '123', '2023-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(30) NOT NULL,
  `kode_klasifikasi` varchar(10) NOT NULL,
  `judul_utama` varchar(100) DEFAULT NULL,
  `anak_judul` varchar(100) NOT NULL,
  `cover_buku` varchar(100) NOT NULL,
  `penulis_buku` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `nama_sumber` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `jml_buku` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `lantai` varchar(10) NOT NULL,
  `rak` varchar(10) NOT NULL,
  `sisi` varchar(10) NOT NULL,
  `susun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_klasifikasi`, `judul_utama`, `anak_judul`, `cover_buku`, `penulis_buku`, `penerbit`, `tahun_terbit`, `tgl_pengadaan`, `nama_sumber`, `harga`, `jml_buku`, `stok`, `lantai`, `rak`, `sisi`, `susun`) VALUES
('200812180001025/STAKN/B', '248.088 1', 'Beriman dan Berilmu', 'Spiritualitas Mahasiswa Teologi dan PAK', 'CamScanner 05-03-2023 10.43_20.jpg', 'David Cupples', 'PT BPK GUNUNG MULIA', 2007, '2008-12-18', 'DIPA STAKN PALANGKA RAYA', 60000, 2, 2, '2', 'F1', 'B', '2'),
('201011230002373/STAKN/B', '270.092', 'Sejarah Pemikiran Kristiani', 'Runtut Pijar', '1_6.jpg', 'Tony Lane', 'PT BPK GUNUNG MULIA', 2009, '2010-11-23', 'DIPA STAKN PALANGKA RAYA', 30000, 8, 8, '2', 'K1', 'A', '2'),
('201011230002405/STAKN/B', '268.071 2', 'Pedoman Pelayanan Anak', '', '1_12.jpg', 'Ruth Laufer', 'Grafika Dinoyo', 1993, '2010-11-23', 'DIPA STAKN PALANGKA RAYA', 65000, 8, 8, '2', 'J1', 'B', '2'),
('201011230002501/STAKN/B', '270.022', '100 Peristiwa Penting Dalam Sejarah Kristen', '', '1_4.jpg', 'A. Kenneth Curtis, J. Stephen Lang, and Randy Pete', 'PT BPK GUNUNG MULIA', 2011, '2010-11-23', 'DIPA STAKN PALANGKA RAYA', 68400, 8, 8, '2', 'K1', 'A', '2'),
('201011230002853/STAKN/B', '259.023 1', 'Etika Pastoral', 'Dilengkapi dengan Kode Etik', 'CamScanner 05-03-2023 10.43_14.jpg', 'Richard M. Gula', 'Kanisius', 2013, '2010-11-23', 'DIPA STAKN PALANGKA RAYA', 30000, 5, 5, '2', 'I1', 'B', '3'),
('201110280005210/STAKN/B', '248.088 2', '120 Renungan Istimewa Bagi Pria', '', 'CamScanner 05-03-2023 10.43_16.jpg', 'Richard C. Halverson', 'PT BPK GUNUNG MULIA', 2009, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 96800, 10, 10, '2', 'F1', 'B', '3'),
('201110280006620/STAKN/B', '270.022', 'Gereja Mencari Jawab', 'Kapita Selekta Sejarah Gereja', '1_1.jpg', 'Dr. Christiaan de Jonge', 'PT BPK GUNUNG MULIA', 2009, '2011-08-28', 'DIPA STAKN PALANGKA RAYA', 67000, 9, 9, '2', 'K1', 'A', '2'),
('201110280006630/STAKN/B', '248.088 3', 'Laugh Is Beautiful', 'Tertawa Bersama Allah', 'CamScanner 05-03-2023 10.43_24.jpg', 'Xavier Quentin Pranata', 'PT BPK GUNUNG MULIA', 2009, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 57000, 9, 9, '2', 'F1', 'B', '2'),
('201110280006640/STAKN/B', '248.088 3', 'Life Is Beautiful', 'Kado Terbaik Dari Tuhan', 'CamScanner 05-03-2023 10.43_18.jpg', 'Xavier Quentin Pranata', 'PT BPK GUNUNG MULIA', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 70000, 10, 10, '2', 'F1', 'B', '3'),
('201110280006660/STAKN/B', '248.088 3', 'Love Is Beautiful', 'Ketika Iman Bersanding Cinta', 'CamScanner 05-03-2023 10.43_25.jpg', 'Xavier Quentin Pranata', 'Inspirasi Indonesia', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 83000, 10, 10, '2', 'F1', 'B', '2'),
('201110280006712/STAKN/B', '252.023 1', 'Ada Waktu Mengelus, Ada Waktu Menggampar', '', 'CamScanner 05-03-2023 10.43_5.jpg', 'L.Z. Raprap', 'PT BPK GUNUNG MULIA', 2010, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 84000, 9, 9, '2', 'I1', 'B', '2'),
('201110280006922/STAKN/B', '248.088 3', 'Mengikut Yesus', '', 'CamScanner 05-03-2023 10.43_19.jpg', 'Dietrich Bonhoeffer', 'PT BPK GUNUNG MULIA', 2009, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 69000, 10, 10, '2', 'F1', 'B', '3'),
('201110280007742/STAKN/B', '268.071 1', 'Tuntunlah ke Jalan yang Benar', 'Panduan Mengajar Anak', '1_15.jpg', 'Ruth S. Kadarmanto, M.A.', 'PT BPK GUNUNG MULIA', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 70000, 10, 10, '2', 'J1', 'B', '2'),
('201110280008580/STAKN/B', '252.023 1', 'Selamat Berbakti', '33 Renungan tentang Ibadah', 'CamScanner 05-03-2023 10.43_2.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 54000, 9, 9, '2', 'I1', 'B', '2'),
('201110280008640/STAKN/B', '252.023 1', 'Selamat Menabur', '33 Renungan tentang Didik-Mendidik', 'CamScanner 05-03-2023 10.43_9.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 57000, 9, 9, '2', 'I1', 'B', '3'),
('201110280008670/STAKN/B', '252.023 1', 'Selamat Paskah', '33 Renungan tentang Paskah', 'CamScanner 05-03-2023 10.43_10.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2011, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 61000, 10, 10, '2', 'I1', 'B', '3'),
('201110280008801/STAKN/B', '252.023 1', 'Maaf, ini \"Teh Berani\"', 'Kumpulan Khotbah Jenaka', 'CamScanner 05-03-2023 10.43_1.jpg', 'L.Z. Raprap', 'PT BPK GUNUNG MULIA', 2010, '2011-10-28', 'DIPA STAKN PALANGKA RAYA', 68000, 9, 9, '2', 'I1', 'B', '2'),
('201211190008942/STAKN/B', '248.088 4', 'Apakah Dia Mencintaiku?', 'Pacaran Sehat Remaja Kristen', 'CamScanner 05-03-2023 10.43_22.jpg', 'Natanael Setiadi', 'PT BPK GUNUNG MULIA', 2011, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 77000, 10, 10, '2', 'F1', 'B', '2'),
('201211190009262/STAKN/B', '261.025', 'Adat dan Injil', 'Perjumpaan Adat Dengan Iman Kristen di Tanah Batak', '1_20.jpg', 'Lothar Scheiner', 'PT BPK GUNUNG MULIA', 2019, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 113000, 9, 9, '2', 'J2', 'A', '2'),
('201211190009537/STAKN/B', '248.088 2', '40 Days To Your Best Life For Men', '40 hari menuju kehidupan terbaik anda', 'CamScanner 05-03-2023 10.43_23.jpg', 'Jay K. Payleitner', 'PT BPK GUNUNG MULIA', 2010, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 95000, 10, 10, '2', 'F1', 'B', '2'),
('201211190009897/STAKN/B', '252.023 3', 'Khotbah Masa Kini 7', 'Pembebasan Bagi Para Tawanan-Khotbah dari tahun ke Tahun', 'CamScanner 05-03-2023 10.43_3.jpg', 'Karl Barth', 'PT BPK GUNUNG MULIA', 2009, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 88000, 15, 15, '2', 'I1', 'B', '2'),
('201211190012022/STAKN/B', '262.023', 'Kepemimpinan Yang Dinamis', '', '1_23.jpg', 'Pdt.Dr.Yakob Tomatala', 'Penerbit Gandum Mas', 1997, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 400000, 5, 5, '2', 'J4', 'B', '3'),
('201211190012604/STAKN/B', '248.088 3', 'The Faithful Parent', 'A Biblical Guide to Raising a Family', 'CamScanner 05-03-2023 10.43_21.jpg', 'Martha Peace', 'P&R Publishing Company', 2010, '2012-11-19', 'DIPA STAKN PALANGKA RAYA', 314700, 2, 2, '2', 'F1', 'B', '2'),
('20130401236/STAKN/H', '268.071 3', 'Minggu Ceria', 'Membuat Sekolah Minggu menjadi Aktraktif, Dinamis, dan Menggairahkan', '1_13.jpg', 'Bong Sook Kim', 'ANDI', 2010, '2013-07-01', 'LEMBAGA PEMERINTAH NON KEMENAG', 59900, 2, 2, '2', 'J1', 'B', '2'),
('201312020013787/STAKN/B', '259.023 2', 'Kuatir', 'Pedoman Bagi Konselor', 'CamScanner 05-03-2023 10.43_13.jpg', 'James R. Beck', 'PT BPK GUNUNG MULIA', 2011, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 142000, 5, 5, '2', 'I1', 'B', '3'),
('201312020014217/STAKN/B', '242.201', 'Selamat Berteduh', '33 Kumpulan Doa', 'CamScanner 05-03-2023 10.43_8.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2012, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 89000, 5, 5, '2', 'I1', 'B', '3'),
('201312020014247/STAKN/B', '252.023 2', 'Selamat Natal', '33 Renungan tentang Natal', 'CamScanner 05-03-2023 10.43_7.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2012, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 73900, 5, 5, '2', 'I1', 'B', '3'),
('201312020014252/STAKN/B', '252.023 1', 'Selamat Pagi Tuhan!', '33 Renungan tentang Doa', 'CamScanner 05-03-2023 10.43_6.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2012, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 69000, 5, 5, '2', 'I1', 'B', '3'),
('201312020014257/STAKN/B', '252.023 1', 'Selamat Panjang Umur', '33 Renungan tentang Hidup', 'CamScanner 05-03-2023 10.43_4.jpg', 'Andar Ismail', 'PT BPK GUNUNG MULIA', 2012, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 67000, 5, 5, '2', 'I1', 'B', '2'),
('201312020015153/STAKN/B', '248.088 3', 'Mau Bahagia?', '', 'CamScanner 05-03-2023 10.43_17.jpg', 'Theo Riyanto', 'Kanisius', 2013, '2013-12-02', 'DIPA STAKN PALANGKA RAYA', 60500, 5, 5, '2', 'F1', 'B', '3'),
('201312020015656/STAKN/B', '270.068', 'Reformasi dari Dalam', 'Sejarah Gereja Zaman Modern', '1_2.jpg', 'Eddy Kristiyanto, OFM', 'Kanisius', 2004, '2013-12-02', 'DIPA IAKN PALANGKA RAYA', 76000, 5, 5, '2', 'K1', 'A', '2'),
('201512160017020/STAKN/B', '259.023 2', 'Pengantar Psikologi dan Konseling Kristen', '40 Topik Penting dan Menarik Seputar Seksualitas', 'CamScanner 05-03-2023 10.43_15.jpg', 'Paul D. Meier', 'ANDI', 2009, '2015-12-16', 'DIPA STAKN PALANGKA RAYA', 79000, 6, 6, '2', 'I1', 'B', '3'),
('201612310019253/STAKN/B', '259.088', 'Penggembalaan', 'Hal-hal yang Pastoral', 'CamScanner 05-03-2023 10.43_11.jpg', 'E.P. Gintings', 'Jurnal Info Media', 2009, '2016-12-31', 'DIPA STAKN PALANGKA RAYA', 26400, 13, 13, '2', 'I1', 'B', '3'),
('201612310019616/STAKN/B', '268.071 1', 'Filsafat Pendidikan Kristen', 'Meletakkan Fondasi dan Filosofi Pendidikan Kristen di Tengah Tantangan Filsafat Dunia', '1_9.jpg', 'Khoe Yao Tung', 'ANDI', 2013, '2016-12-31', 'DIPA STAKN PALANGKA RAYA', 71500, 10, 10, '2', 'J2', 'B', '3'),
('201612310019704/STAKN/B', '268.071 1', 'Filsafat Pendidikan dan Pendidikan Kristen', '', '1_10.jpg', 'Junihot Simanjuntak', 'ANDI', 2013, '2016-12-31', 'DIPA STAKN PALANGKA RAYA', 45100, 11, 11, '2', 'J2', 'B', '3'),
('201612310019737/STAKN/B', '262.023', 'Organic Leadership', '', '1_25.jpg', 'Neil Cole', 'ANDI', 2016, '2016-12-31', 'DIPA STAKN PALANGKA RAYA', 99000, 11, 11, '2', 'J4', 'B', '3'),
('20180601429/STAKN/H', '268.071 1', 'Sejarah PAK : Tokoh-Tokoh Besar PAK', '', '1_11.jpg', 'Daniel Stefanus, D.Th.', 'Bina Media Informasi', 2009, '2018-01-04', 'Hibah : Sumber Tidak Diketahui', 55000, 4, 4, '2', 'J2', 'B', '3'),
('201912190021256/STAKN/B', '270.519', 'Rahasia Keberhasilan Gereja di Korea', 'Telaah Komprehensif tentang Laju Pertumbuhan Gereja di Korea', '1_3.jpg', 'Sukamto M. Div', 'ANDI', 2006, '2019-12-19', 'DIPA IAKN PALANGKA RAYA', 88000, 3, 3, '2', 'K1', 'A', '2'),
('201912190021748/STAKN/B', '268.071 1', 'Pendidikan Nilai-Nilai Kristiani', 'Menabur Norma Menuai Nilai', '1_7.jpg', 'Dr. F. Thomas Edison, M.Si.', 'Yayasan Kalam Hidup', 2018, '2019-12-19', 'DIPA STAKN PALANGKA RAYA', 102000, 6, 6, '2', 'J2', 'B', '3'),
('201912190021760/STAKN/B', '268.071 1', 'Mengajar Secara Profesional', '', '1_8.jpg', 'B.S. Sidjabat, Ed.D.', 'Yayasan Kalam Hidup', 2011, '2019-12-19', 'DIPA STAKN PALANGKA RAYA', 124000, 6, 6, '2', 'J2', 'B', '3'),
('201912190022144/STAKN/B', '262.023', 'Spirituality & Leadership (Kerohanian & Kepemimpinan)', 'Gunakan Hikmat, Pimpinan & Jiwa yang Kuat', '1_24.jpg', 'Alan E. Nelson', 'Yayasan Kalam Hidup', 2007, '2019-12-19', 'DIPA STAKN PALANGKA RAYA', 99000, 10, 10, '2', 'J4', 'B', '3'),
('202111180022487/IAKN/B', '259.023 2', 'Kuatir', 'Bimbingan Praktis Mengatasi Kekuatiran', 'CamScanner 05-03-2023 10.43_12.jpg', 'James R. Beck', 'PT BPK GUNUNG MULIA', 2020, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 50000, 4, 4, '2', 'I1', 'B', '3'),
('202111180022523/IAKN/B', '268.071 1', 'Tuntunlah ke Jalan yang Benar', 'Panduan Mengajar Remaja di Jemaat', '1_16.jpg', 'Ruth S. Kadarmanto, M.A.', 'PT BPK GUNUNG MULIA', 2010, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 92000, 4, 4, '2', 'J1', 'B', '2'),
('202111180022655/IAKN/B', '270.092', 'Runtut Pijar', 'Tokoh dan Pemikiran Kristen dari Masa Ke Masa', '1_5.jpg', 'Tony Lane', 'PT BPK GUNUNG MULIA', 2016, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 148000, 3, 3, '2', 'K1', 'A', '2'),
('202111180022831/IAKN/B', '261.208', 'Perkawinan Menurut Islam dan Katolik', 'Implikasinya dalam Kawin Campur', '1_19.jpg', 'Dr. Al. Purwa Hadiwardoyo, MSF', 'Kanisius', 1990, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 44000, 4, 4, '2', 'J2', 'A', '2'),
('202111180022915/IAKN/B', '261.025', 'Ringkasan Ajaran Sosial Gereja', '', '1_17.jpg', 'Al. Purwa Hadiwardoyo, MSF', 'Kanisius', 2020, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 55000, 4, 4, '2', 'J2', 'A', '2'),
('202111180023287/IAKN/B', '268.071 1', 'Biarkan Anak-Anak Datang Pada-Ku', 'Program Integrasi PAUD-BIA', '1_14.jpg', 'Tim Penulis Komisi Kateketik KWI', 'Kanisius', 2018, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 11000, 4, 4, '2', 'J1', 'B', '2'),
('202111180023655/IAKN/B', '261.025', 'OMK Misionaris Perdamaian', '', '1_18.jpg', 'Yohanes Kopong Tuan, MSF', 'Kanisius', 2021, '2021-11-18', 'DIPA IAKN PALANGKA RAYA', 66000, 4, 4, '2', 'J2', 'A', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu_ang`
--

CREATE TABLE `buku_tamu_ang` (
  `id_kunjungan` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `keperluan` varchar(500) NOT NULL,
  `waktu_berkunjung` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu_peng`
--

CREATE TABLE `buku_tamu_peng` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` varchar(10) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
('FISKK', 'Fakultas Ilmu Sosial dan Keagamaan Kristen'),
('FKIPK', 'Fakultas Keguruan dan Ilmu Pendidikan Kristen'),
('FSKK', 'Fakultas Seni dan Keagamaan Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `kode_klasifikasi` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`kode_klasifikasi`, `subject`) VALUES
('242.201', 'Doa Kristen'),
('248.088 1', 'Spiritualitas'),
('248.088 2', 'Renungan Kristen'),
('248.088 3', 'Bacaan Rohani Kristen'),
('248.088 4', 'Pacaran Kristen'),
('252.023 1', 'Khotbah Kristen'),
('252.023 2', 'Khotbah Natal'),
('252.023 3', 'Pancasila'),
('259.023 1', 'Etika Pastoral'),
('259.023 2', 'Pastoral Konseling'),
('259.088', 'Penggembalaan'),
('261.025', 'Teologi Sosial Kristen'),
('261.208', 'Dialog Agama'),
('262.023', 'Kepemimpinan Kristen'),
('268.071 1', 'Pendidikan Kristen'),
('268.071 2', 'Pelayanan Anak'),
('268.071 3', 'Sekolah Minggu'),
('270.022', 'Sejarah Gereja'),
('270.068', 'Reformasi Sejarah Gereja'),
('270.092', 'Tokoh Gereja'),
('270.519', 'Gereja Korea');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `judul_utama` varchar(100) NOT NULL,
  `anak_judul` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `id_buku` varchar(30) NOT NULL,
  `judul_utama` varchar(100) NOT NULL,
  `anak_judul` varchar(100) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL,
  `id_fakultas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`) VALUES
('001', 'S1 Pendidikan Agama Kristen', 'FKIPK'),
('002', 'S1 Pendidikan Kristen Anak Usia Dini', 'FKIPK'),
('003', 'S1 Manajemen Pendidikan Kristen', 'FKIPK'),
('004', 'S1 Pendidikan Musik Gereja', 'FKIPK'),
('005', 'S1 Bimbingan dan Konseling Kristen', 'FKIPK'),
('006', 'S1 Teologi', 'FISKK'),
('007', 'S1 Kepemimpinan Kristen', 'FISKK'),
('008', 'S1 Pastoral Konseling', 'FISKK'),
('009', 'S1 Sosiologi Agama', 'FISKK'),
('010', 'S1 Psikologi Kristen', 'FISKK'),
('011', 'S1 Musik Gereja', 'FSKK'),
('012', 'S1 Seni Pertunjukkan Keagamaan', 'FSKK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `id_staf` int(10) NOT NULL,
  `nama_staf` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staf`
--

INSERT INTO `staf` (`id_staf`, `nama_staf`, `username`, `password`) VALUES
(2023001, 'Julidi Lahagu', 'jlahagu', 'julidi22'),
(2023002, 'Staf1', 'staf1', '123'),
(2023003, 'Staf2', 'staf2', '123'),
(2023004, 'Staf3', 'staf3', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kode_klasifikasi` (`kode_klasifikasi`);

--
-- Indeks untuk tabel `buku_tamu_ang`
--
ALTER TABLE `buku_tamu_ang`
  ADD PRIMARY KEY (`id_kunjungan`),
  ADD KEY `Chekin` (`id_anggota`);

--
-- Indeks untuk tabel `buku_tamu_peng`
--
ALTER TABLE `buku_tamu_peng`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`kode_klasifikasi`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`id_staf`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_tamu_ang`
--
ALTER TABLE `buku_tamu_ang`
  MODIFY `id_kunjungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `buku_tamu_peng`
--
ALTER TABLE `buku_tamu_peng`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `staf`
--
ALTER TABLE `staf`
  MODIFY `id_staf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023005;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kode_klasifikasi`) REFERENCES `klasifikasi` (`kode_klasifikasi`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
