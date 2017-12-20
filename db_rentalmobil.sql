-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 06 Jan 2017 pada 10.55
-- Versi Server: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_rentalmobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE IF NOT EXISTS `fasilitas` (
`id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `harga_fasilitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `harga_fasilitas`) VALUES
(1, 'VIP', '20000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `username`, `password`, `nama_karyawan`, `alamat`, `no_telp`, `level`, `gambar`) VALUES
(1, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'alamat', '98989898', 0, '14365355_1105838576195339_524673289_n.jpg.46882.44428.45272.jpg'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Wahyu', 'lumjang', '0808080', 1, '43380.15685.84353.png'),
(3, 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'Tegar', 'Jember', '09090909090', 2, ''),
(6, 'iiuoi', '17324235011af66d659cbb7a2d2cbe6e', '98989', '9889', '98989', 1, 'aisaka_taiga__toradora__minimalist_wallpaper_by_greenmapple17-d8fxreb.png.62954.41670.45475.png'),
(7, 'shofa', '3e951b9760b0e4a4c052c1330fd7e531', 'shofa wj', 'pagowan', '085852737357', 1, ''),
(8, 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'wahyu', 'lumajang', '989', 2, ''),
(10, 'jkjk', 'kj', 'kjkj', 'kj', '98', 1, ''),
(11, 'hhh1hh1', 'hh', 'h', 'h', '666', 2, '38255.55272.91720.png'),
(12, 'asasasa', 'asdas', 'alvin', 'sukodono', '111', 2, '49791.jpg'),
(13, 'jhhjhj', 'hjhjjh', 'hjhjhj', 'hjhjh', '767667', 1, ''),
(14, 'kjjkjkkjjkjkjkjkjkj', 'kiu8877', '8', '787', '878', 1, ''),
(15, 'wew', 'wew', 'wew', 'wew', '444', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan_lain`
--

CREATE TABLE IF NOT EXISTS `karyawan_lain` (
`id_karyawan_lain` int(11) NOT NULL,
  `nama_karyawan_lain` varchar(30) NOT NULL,
  `alamat_karyawan_lain` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `staff_bagian` varchar(30) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan_lain`
--

INSERT INTO `karyawan_lain` (`id_karyawan_lain`, `nama_karyawan_lain`, `alamat_karyawan_lain`, `no_telp`, `staff_bagian`, `gambar`) VALUES
(2, 'Alvin', 'sukodono', '123', 'Sales', '36256.62745.24463.png'),
(7, 'Paimo', 'lumajang', '887887', 'Sales', ''),
(8, 'Paijo', '878787', '878787', 'Service', '[telasm]-175-birds-v2-(2013)-wallpapers--058.jpg.71119.7591.53936.jpg'),
(9, 'popo', '98', '8787', 'Pencuci Mobil', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `nopol` varchar(50) NOT NULL,
  `id_karyawan` int(255) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `harga` decimal(65,0) DEFAULT NULL,
  `noka` varchar(50) DEFAULT NULL,
  `nosin` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `spesifikasi` longtext,
  `gmbrmobil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`nopol`, `id_karyawan`, `jenis`, `merk`, `warna`, `harga`, `noka`, `nosin`, `status`, `spesifikasi`, `gmbrmobil`) VALUES
('ads', 1, 'ad', 'ada', 'asd', 234, 'ad', 'ada', 'ready', 'adsdf', '49911.66667.90540.jpg'),
('asdads', 1, 'ads', 'ad', 'asd', 3234, 'asdad', 'asda', 'ready', 'sad', '61799.89958.838.png'),
('jhj', 2, 'hjhjh', 'jhjh', 'jhj', 87878, 'jhjhj', 'jhj', 'Terpinjam', 'iui', '13673.94701.87589.png'),
('lkl', 1, 'klk', 'lkl', 'kl', 989, 'klklk', 'lkl', 'ready', 'l', ''),
('lnnl', 2, 'nn', 'nn', 'nn', 88, 'nnn', 'nnn', 'Perbaikan', '`kj', 'saber___fate_stay_night_minimalist_anime_by_lucifer012-d9meeh9 - Copy.png.8355.25834.56736.png'),
('lnnll', 2, 'nn', 'nn', 'nn', 88, 'nnn', 'nnn', 'ready', '`kj', ''),
('nnl', 2, 'nn', 'nn', 'nn', 88, 'nnn', 'nnn', 'ready', '`kj', ''),
('nnnm', 2, 'nnn', 'nnn', 'nnn', 8888, 'nnn', 'nnn', 'Perbaikan', '8888', ''),
('nnnmm', 2, 'nnn', 'nnn', 'nnn', 8888, 'nnn', 'nnn', 'ready', '8888', ''),
('oioi', 1, 'oioioi', '98989', '98989', 9898, 'oioio', 'oioio', 'ready', '9898\r\n', ''),
('ooo', 2, 'uyuy', 'uyuy', 'uyu', 10, 'uyuy', 'uyuy', 'ready', 'jhkj', ''),
('ppppp', 1, 'klk', 'lkl', 'kl', 989, 'klklk', 'lkl', 'ready', 'l', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat_pelanggan` varchar(50) DEFAULT NULL,
  `no_telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat_pelanggan`, `no_telephone`) VALUES
(172, 'johan', 'Laki-Laki', 'bangil', '87878'),
(173, 'Weleh', 'Laki-Laki', 'uuu', '777'),
(174, 'ooo', 'Laki-Laki', '898', '898'),
(175, 'klkl', 'Laki-Laki', '98989', '989'),
(176, 'mmm', 'Laki-Laki', 'mmm', '888'),
(177, 'kkkk', 'Laki-Laki', 'iiii', '999'),
(178, 'Paijo', 'Laki-Laki', 'lumajang', '9090988787'),
(179, 'ooo', 'Laki-Laki', 'pppp', '87878'),
(180, 'wahyu', 'Laki-Laki', 'lumajang', '98898');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE IF NOT EXISTS `pemasukan` (
`id_pemasukan` int(11) NOT NULL,
  `pemasukan` varchar(50) NOT NULL,
  `harga_pemasukan` varchar(255) NOT NULL,
  `tgl_pemasukan` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `pemasukan`, `harga_pemasukan`, `tgl_pemasukan`) VALUES
(1, 'wew', '1000000', '2010-10-01'),
(7, 'Peminjaman Mobil', '43939', '2016-11-14'),
(8, 'Peminjaman Mobil', '4393.5', '2016-11-15'),
(9, 'Peminjaman Mobil', '4494', '2016-11-16'),
(11, 'Peminjaman Mobil', '4494', '2016-11-16'),
(12, 'Penerimaan Denda', '620000', '2016-11-16'),
(13, 'Peminjaman Mobil', '44', '2016-11-16'),
(15, 'Peminjaman Mobil', '44', '2016-11-16'),
(16, 'Penerimaan Denda', '1100000', '2016-11-16'),
(18, 'THR', '100000', '2016-11-16'),
(22, 'gajian', '9999', '2016-11-16'),
(23, 'gajian', '9999', '2016-11-16'),
(24, 'gajian', '9999', '2016-11-16'),
(25, 'wew', '998', '2016-11-16'),
(26, 'kjkjkjkjkj', '123', '2016-11-16'),
(27, 'Penerimaan Denda', '', '2016-11-16'),
(28, 'Peminjaman Mobil', '4444', '2016-11-16'),
(29, 'Peminjaman Mobil', '50044', '2016-11-16'),
(30, 'Penerimaan Denda', '', '2016-11-16'),
(31, 'Peminjaman Mobil', '60044', '2016-11-16'),
(32, 'Peminjaman Mobil', '120088', '2016-11-16'),
(33, 'Penerimaan Denda', '', '2016-11-16'),
(34, 'Peminjaman Mobil', '50044', '2016-11-16'),
(36, 'Penerimaan Denda', '980000', '2016-11-20'),
(37, 'Penerimaan Denda', '960000', '2016-11-20'),
(38, 'Penerimaan Denda', '870000', '2016-11-20'),
(39, 'Peminjaman Mobil', '93939', '2016-11-20'),
(43, 'Peminjaman Mobil', '50044', '2016-11-20'),
(45, 'Peminjaman Mobil', '43939', '2016-11-20'),
(46, 'Peminjaman Mobil', '50044', '2016-11-20'),
(48, 'Peminjaman Mobil', '50044', '2016-11-20'),
(51, 'Penerimaan Denda', '1690000', '2016-11-21'),
(52, 'Peminjaman Mobil', '60494.5', '2016-11-21'),
(53, 'Peminjaman Mobil', '10044', '2016-11-21'),
(54, 'Peminjaman Mobil', '44', '2016-11-21'),
(55, 'Peminjaman Mobil', '43939', '2016-11-27'),
(56, 'Penerimaan Denda', '11260000', '2017-01-06'),
(57, 'Penerimaan Denda', '11020000', '2017-01-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
`id_pengeluaran` int(11) NOT NULL,
  `pengeluaran` varchar(50) NOT NULL,
  `harga_pengeluaran` varchar(255) NOT NULL,
  `tgl_pengeluaran` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `pengeluaran`, `harga_pengeluaran`, `tgl_pengeluaran`) VALUES
(1, 'wewe', '1000', '2010-12-01'),
(4, 'Perbaikan Mobil', '10000', '2016-11-14'),
(14, 'Pembelian Mobil', '8888', '2016-11-16'),
(15, 'Pembelian Mobil', '8988', '2016-11-16'),
(16, 'Biaya Becak', '10000', '2016-11-16'),
(17, 'Biaya Anak', '9898', '2016-11-16'),
(18, 'qq', '1212', '2016-11-16'),
(19, 'kkkk', '9999', '2016-11-16'),
(20, 'ttt', '111', '2016-11-16'),
(23, 'Perbaikan Mobil', '100000', '2016-11-20'),
(24, 'Perbaikan Mobil', '10000', '2016-11-20'),
(25, 'Perbaikan Mobil', '10', '2016-11-20'),
(26, 'Perbaikan Mobil', '10', '2016-11-20'),
(27, 'Perbaikan Mobil', '10', '2016-11-20'),
(28, 'Perbaikan Mobil', '1000', '2016-11-20'),
(30, 'Perbaikan Mobil', '2', '2016-11-20'),
(31, 'Perbaikan Mobil', '1000', '2016-11-20'),
(34, 'Pembelian Mobil', '9898', '2016-11-21'),
(35, 'Pembelian Mobil', '989', '2016-11-21'),
(36, 'Pembelian Mobil', '989', '2016-11-21'),
(37, 'Pembelian Mobil', '3234', '2016-11-27'),
(38, 'Pembelian Mobil', '234', '2016-11-27'),
(39, 'Perbaikan Mobil', '1000', '2016-11-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE IF NOT EXISTS `supir` (
`id_supir` int(11) NOT NULL,
  `nama_supir` varchar(50) DEFAULT NULL,
  `alamat_supir` varchar(50) DEFAULT NULL,
  `telp_supir` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nama_supir`, `alamat_supir`, `telp_supir`, `status`) VALUES
(1, 'Paimo', 'majang', '8878787', 'ready'),
(2, 'Paijo', 'majang', '9889', 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_supir` int(255) DEFAULT NULL,
  `id_karyawan` int(255) DEFAULT NULL,
  `id_fasilitas` int(255) DEFAULT NULL,
  `id_pelanggan` int(255) DEFAULT NULL,
  `nopol` varchar(50) DEFAULT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `harga_total` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_supir`, `id_karyawan`, `id_fasilitas`, `id_pelanggan`, `nopol`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `harga_total`) VALUES
(168, 3, 9, 0, 172, 'jhj', '2016-11-20 14:51:02', '2016-11-21 02:51:02', 'Kembali', 93939),
(169, 3, 9, 0, 173, 'jhj', '2016-11-20 14:52:51', '2016-11-21 02:52:51', 'Kembali', 93939),
(170, 2, 9, 0, 174, 'lnnl', '2016-11-20 14:54:15', '2016-11-21 02:54:15', 'Kembali', 50044),
(171, 0, 9, 0, 175, 'jhj', '2016-11-18 00:00:00', '2016-11-18 12:00:00', 'Terpinjam', 43939),
(172, 2, 9, 0, 176, 'lnnl', '2016-11-20 15:00:36', '2016-11-21 03:00:36', 'Kembali', 50044),
(173, 2, 9, 0, 177, 'lnnl', '2016-11-20 15:02:29', '2016-11-21 03:02:29', 'Kembali', 50044),
(174, 1, 2, 1, 178, 'lkl', '2016-11-21 00:00:00', '2016-11-21 12:00:00', 'Kembali', 60495),
(175, 0, 2, 1, 179, 'lnnll', '2016-11-20 00:00:00', '2016-11-20 12:00:00', 'Kembali', 10044),
(176, 0, 1, 0, 180, 'jhj', '2016-11-27 07:54:59', '2016-11-27 19:54:59', 'Terpinjam', 43939);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
 ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `karyawan_lain`
--
ALTER TABLE `karyawan_lain`
 ADD PRIMARY KEY (`id_karyawan_lain`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
 ADD PRIMARY KEY (`nopol`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
 ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
 ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
 ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `karyawan_lain`
--
ALTER TABLE `karyawan_lain`
MODIFY `id_karyawan_lain` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
