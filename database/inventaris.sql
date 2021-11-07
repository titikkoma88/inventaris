-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2019 pada 13.33
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `spesifikasi_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `sumber_dana` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `gambar_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `spesifikasi_barang`, `harga_barang`, `kondisi`, `sumber_dana`, `id_supplier`, `tanggal_beli`, `gambar_barang`) VALUES
(61, 1, 'Epson Lumen 5000', '3500000', 'Rusak', 'BOS', 2, '2019-02-23', 'epson-lumen-5000.jpg'),
(62, 1, 'Infocus Lumen 4000', '3500000', 'Rusak', 'BOS', 2, '2019-02-23', 'infocus-lumen-4000jpg.jpg'),
(63, 1, 'Epson EB X450 3600 Lumens', '2400000', 'Rusak', 'BOS', 2, '2019-02-23', 'PROYEKTOR-EPSON-EB-X450-LCD-3600.jpg'),
(64, 1, 'Cheerlux C6 Mini', '1100000', 'Hilang', 'BOS', 2, '2019-02-23', 'CHEERLUX-C6-Mini.jpg'),
(65, 1, 'Epson EB-X400 XGA', '2000000', 'Baik', 'BOS', 2, '2019-02-23', 'LCD-PROJECTOR-EPSON-EB-X400-XGA.jpg'),
(66, 1, 'Cheerlux CL760', '1500000', 'Baik', 'BOS', 2, '2019-02-23', 'Cheerlux-CL760.jpg'),
(67, 1, 'BenQ MS506-P', '1800000', 'Baik', 'BOS', 2, '2019-02-23', 'BENQ-MS506-P.jpg'),
(68, 1, 'Panasonic PTLB280', '2100000', 'Baik', 'BOS', 2, '2019-02-23', 'panasonic-PTLB280.jpg'),
(69, 1, 'Microvision MS350 3500 Lumens', '2500000', 'Baik', 'BOS', 2, '2019-02-23', 'MICROVISION-MS350-3500-Lumens.jpg'),
(70, 1, 'ACER X1223H', '3000000', 'Baik', 'BOS', 2, '2019-02-23', 'ACER-X1223H.png'),
(71, 2, 'Futsal Nike Menor X Hyper Blue White', '0', 'Rusak', 'BOS', 3, '2019-02-23', 'Bola Futsal NIKE Menor X Hyper Blue White - ORIGINAL.jpg'),
(72, 2, 'Futsal Specs Radiate FS Ball Yellow New 2018 ', '0', 'Rusak', 'BOS', 2, '2019-02-23', 'BOLA FUTSAL SPECS RADIATE FS BALL ORIGINAL YELLOW NEW 2018.jpg'),
(73, 2, 'Futsal Kelme Olimpo 20 FS Ball Lime BNWT', '0', 'Rusak', 'BOS', 2, '2019-02-23', 'Bola Futsal Kelme Olimpo 20 FS Ball Lime 3105402 Original BNWT.jpg'),
(164, 2, 'Adidas Original Tango Sala Cream-Blue Street Skillz', '0', 'Hilang', 'BOS', 3, '2019-02-18', 'adidas original Tango Sala cream-biru Street Skillz.png'),
(165, 2, 'Nike Menor X Ball Racer Blue Metallic SC3039-410', '0', 'Baik', 'BOS', 3, '2019-02-18', 'Bola Futsal Nike Menor X Ball Racer Blue Metallic SC3039-410 Original.jpg'),
(166, 2, 'Nike Menor X Ball Red', '0', 'Baik', 'Mandiri', 3, '2019-02-07', 'BOLA FUTSAL NIKE MENOR X BALL RED.jpg'),
(167, 2, 'Mitre Titania - Yellow', '0', 'Baik', 'Mandiri', 3, '2019-02-07', 'Mitre Titania - Yellow.jpg'),
(168, 2, 'Nike Menor X Pro Brasil SC3524405 Royal Blue', '0', 'Baik', 'BOS', 3, '2019-02-01', 'NIKE MENOR X PRO BRASIL ORIGINAL SC3524405 ROYAL BLUE.jpg'),
(169, 2, 'Nike Original Premier X Ball White Black SC3564-100 BNWT', '0', 'Baik', 'BOS', 3, '2019-02-01', 'Nike Original Premier X Ball White Black SC3564-100 BNWT.jpg'),
(170, 2, 'Mitre Delta FS Ball White Pink A0028WWB Original BNWT', '0', 'Baik', 'BOS', 3, '2019-02-17', 'Mitre Delta FS Ball White Pink A0028WWB Original BNWT.jpg'),
(171, 3, 'Kabel HDMI 1 Meter', '150000', 'Hilang', 'BOS', 7, '2019-03-31', 'kabel-vga-vektor.jpg'),
(172, 3, 'Kabel HDMI 100 Meter', '15000000', 'Hilang', 'BOS', 7, '2019-03-31', 'kabel-roll-vektor.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nm_jenis`, `gambar`) VALUES
(1, 'Proyektor LCD', 'proyektor-vektor.jpg'),
(2, 'Bola', 'bola-vektor.php.jpg'),
(3, 'Kabel VGA', 'kabel-vga-vektor.jpg'),
(6, 'Kabel Roll', 'kabel-roll-vektor.jpg'),
(28, 'Monitor', 'monitor-vector.jpg'),
(33, 'Buku', 'buku.jpg'),
(34, 'Bola Basket', 'basket.jpg'),
(49, 'Mouse', 'mouse.jpg');

--
-- Trigger `jenis`
--
DELIMITER $$
CREATE TRIGGER `hps_jenis` BEFORE DELETE ON `jenis` FOR EACH ROW DELETE FROM barang
WHERE id_jenis = old.id_jenis
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi_rusak`
--

CREATE TABLE `kondisi_rusak` (
  `id_rusak` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `tanggal_rusak` date NOT NULL,
  `tanggal_bayar_gt` date NOT NULL,
  `status_gt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi_rusak`
--

INSERT INTO `kondisi_rusak` (`id_rusak`, `id_pinjam`, `kondisi`, `tanggal_rusak`, `tanggal_bayar_gt`, `status_gt`) VALUES
(23, 62, 'Rusak', '0000-00-00', '2019-03-24', '1'),
(24, 63, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(25, 64, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(26, 65, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(27, 66, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(28, 67, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(29, 68, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(30, 69, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(31, 70, 'Rusak', '2019-03-24', '2019-03-24', '1'),
(32, 71, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(33, 72, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(34, 73, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(35, 74, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(36, 75, 'Hilang', '2019-03-31', '2019-03-31', '1'),
(37, 76, 'Hilang', '2019-03-31', '2019-03-31', '1'),
(38, 77, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(39, 78, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(40, 79, 'Rusak', '2019-03-31', '2019-03-31', '1'),
(41, 80, 'Rusak', '2019-03-31', '2019-04-23', '1'),
(42, 81, 'Rusak', '2019-03-31', '2019-04-23', '1'),
(43, 82, 'Rusak', '2019-03-31', '2019-04-23', '1'),
(44, 83, 'Hilang', '2019-03-31', '2019-04-23', '1'),
(45, 84, 'Rusak', '2019-03-31', '2019-04-23', '1'),
(46, 85, 'Rusak', '2019-04-23', '2019-04-23', '1'),
(47, 86, 'Hilang', '2019-04-23', '2019-04-23', '1'),
(48, 86, 'Hilang', '2019-04-23', '2019-04-23', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_user`
--

CREATE TABLE `kontak_user` (
  `id_kontak` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email_kontak` varchar(255) NOT NULL,
  `teks` text NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak_user`
--

INSERT INTO `kontak_user` (`id_kontak`, `id_user`, `email_kontak`, `teks`, `tanggal_pesan`) VALUES
(1, 3, 'dadanqq@gmail.com', 'woyy ajg', '2019-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak_user_bd`
--

CREATE TABLE `kontak_user_bd` (
  `id_kontak_bd` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `teks` text NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak_user_bd`
--

INSERT INTO `kontak_user_bd` (`id_kontak_bd`, `username`, `teks`, `tanggal_pesan`) VALUES
(1, 'drz579', 'asd', '2019-04-01'),
(2, 'drz579', 'asd', '2019-04-01'),
(3, 'drz579', 'tolong saya lupa password as', '2019-04-01'),
(4, 'ryuz', 'asdsad', '2019-04-23'),
(5, 'ryuz', 'asdsad', '2019-04-23'),
(6, 'ryuz', 'asdsad', '2019-04-23'),
(7, 'ryuz', 'asdsad', '2019-04-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `id_user`, `id_barang`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(47, 5, 61, '2019-03-09', '2019-03-09', 2),
(48, 5, 62, '2019-03-09', '2019-03-09', 2),
(49, 3, 62, '2019-03-10', '2019-03-21', 2),
(50, 3, 63, '2019-03-10', '2019-03-21', 2),
(51, 3, 64, '2019-03-10', '2019-03-21', 2),
(52, 3, 61, '2019-03-10', '2019-03-21', 2),
(53, 3, 65, '2019-03-10', '2019-03-21', 2),
(54, 3, 66, '2019-03-10', '2019-03-21', 2),
(55, 3, 71, '2019-03-21', '2019-03-21', 2),
(56, 3, 67, '2019-03-21', '2019-03-21', 2),
(57, 3, 68, '2019-03-21', '2019-03-21', 2),
(58, 3, 69, '2019-03-21', '2019-03-21', 2),
(59, 3, 63, '2019-03-24', '2019-03-24', 2),
(60, 3, 72, '2019-03-24', '2019-03-24', 2),
(61, 3, 166, '2019-03-24', '2019-03-24', 2),
(62, 3, 167, '2019-03-24', '2019-03-24', 2),
(63, 3, 170, '2019-03-24', '2019-03-24', 2),
(64, 3, 61, '2019-03-24', '2019-03-24', 2),
(65, 3, 72, '2019-03-24', '2019-03-24', 2),
(66, 3, 66, '2019-03-24', '2019-03-24', 2),
(67, 3, 64, '2019-03-24', '2019-03-24', 2),
(68, 3, 65, '2019-03-24', '2019-03-24', 2),
(69, 3, 67, '2019-03-24', '2019-03-24', 2),
(70, 3, 68, '2019-03-24', '2019-03-24', 2),
(71, 3, 61, '2019-03-31', '2019-03-31', 2),
(72, 3, 168, '2019-03-31', '2019-03-31', 2),
(73, 3, 73, '2019-03-31', '2019-03-31', 2),
(74, 3, 71, '2019-03-31', '2019-03-31', 2),
(75, 3, 171, '2019-03-31', '2019-03-31', 2),
(76, 3, 172, '2019-03-31', '2019-03-31', 2),
(77, 3, 164, '2019-03-31', '2019-03-31', 2),
(78, 3, 167, '2019-03-31', '2019-03-31', 2),
(79, 3, 166, '2019-03-31', '2019-03-31', 2),
(80, 3, 72, '2019-03-31', '2019-03-31', 2),
(81, 3, 73, '2019-03-31', '2019-03-31', 2),
(82, 3, 71, '2019-03-31', '2019-03-31', 2),
(83, 3, 164, '2019-03-31', '2019-03-31', 2),
(84, 10, 62, '2019-03-31', '2019-03-31', 2),
(85, 3, 63, '2019-04-23', '2019-04-23', 2),
(86, 3, 64, '2019-04-23', '2019-04-23', 2);

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `hps_pinjam` BEFORE DELETE ON `peminjaman` FOR EACH ROW DELETE FROM kondisi_rusak WHERE id_pinjam = old.id_pinjam
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nm_supplier` varchar(255) NOT NULL,
  `telp_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nm_supplier`, `telp_supplier`, `alamat`) VALUES
(2, 'POINT Computer', '083898885191', 'Ciputat'),
(3, 'Azy Sports', '085819885112', 'Viktor'),
(6, 'Surya Mas Computer', '083849287112', 'Muncul'),
(7, 'Ryuz Elektronik', '08811641568', 'Serpong'),
(8, 'Shiawashe Fotocopy', '0837612673', 'Citra Prima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tel_user` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jabatan_sekolah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `foto`, `email`, `password`, `level`, `alamat`, `tel_user`, `kelas`, `jabatan_sekolah`) VALUES
(1, 'Hamdan Ryuz', 'hamdan', '', '', '5eda958ce0a8c250ad09b1c610a85e1d', 'admin', '', '', '', ''),
(2, 'Dadan Ryuz', 'dadan', '', '', 'fd68e8922a6705a916b19669fb356cce', 'manager', 'Serpong', '083874247651', '', ''),
(3, 'Ryuz Ryuz', 'ryuz', 'banner2.png', '', '11ae210aa2215d1084bd39055064f03b', 'peminjam', 'ryuz', '085811639876', '12 AK 2', 'Ketua Kelas'),
(4, 'Ryuz Shiawashe', 'shiawashe', 'banner3.png', '', '3055640b49ee7140ddd33e6824431d06', 'peminjam', 'shiawashe', '083871256781', '12 AP 1', 'Ketua Kelas'),
(5, 'Dann Ryuz', 'dann', 'banner3.png', '', '10e7b30d8f61e75d28a03ec651f8b112', 'manager', 'dann', '08365431352', '12 AK 1', 'Ketua Kelas'),
(7, 'Ine Novia', 'ine', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'manager', 'ine', '083899885112', '12 RPL 1', 'Ketua Kelas'),
(8, 'Ine Novia', 'ine', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'manager', 'cendikia', '083899885112', '', ''),
(9, 'Hamdan Ryuz Hamdan', 'hrh123', 'banner1.png', '', '827ccb0eea8a706c4c34a16891f84e7b', 'peminjam', 'Sengkol', '083899885112', '12 RPL 1', 'Ketua Kelas'),
(10, 'Ryuz Hypertext', 'hypertext', 'LostSagaShot_170620_114635.jpg', 'ryuzhypertext@gmail.com', 'f04c97ca4177e5c224e2a9a2ec90c440', 'peminjam', 'Citra prima', '089817635423', 'Bahasa Indonesia Kelas 12', 'Guru'),
(11, 'Dadan Ryuz Fauzaan', 'drz579', 'LostSagaShot_170620_114538.jpg', 'dadanrf579@gmail.com', 'f7b5451979e2214b9d6ccd600c97d5e1', 'peminjam', 'Pamulang', '083876541762', '12 RPL 1', 'Wakil Ketua Kelas'),
(12, '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'manager', '', '', '', ''),
(13, '', '', '', '', '827ccb0eea8a706c4c34a16891f84e7b', 'manager', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kondisi_rusak`
--
ALTER TABLE `kondisi_rusak`
  ADD PRIMARY KEY (`id_rusak`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `kontak_user`
--
ALTER TABLE `kontak_user`
  ADD PRIMARY KEY (`id_kontak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kontak_user_bd`
--
ALTER TABLE `kontak_user_bd`
  ADD PRIMARY KEY (`id_kontak_bd`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `kondisi_rusak`
--
ALTER TABLE `kondisi_rusak`
  MODIFY `id_rusak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `kontak_user`
--
ALTER TABLE `kontak_user`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kontak_user_bd`
--
ALTER TABLE `kontak_user_bd`
  MODIFY `id_kontak_bd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Ketidakleluasaan untuk tabel `kondisi_rusak`
--
ALTER TABLE `kondisi_rusak`
  ADD CONSTRAINT `kondisi_rusak_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`);

--
-- Ketidakleluasaan untuk tabel `kontak_user`
--
ALTER TABLE `kontak_user`
  ADD CONSTRAINT `kontak_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
