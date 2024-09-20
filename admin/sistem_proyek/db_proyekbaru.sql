-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 11 Mar 2022 pada 03.21
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyekbaru`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `kode` int(20) NOT NULL,
  `jenis` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hb`
--

CREATE TABLE `hb` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs`
--

CREATE TABLE `hs` (
  `kode_hs` int(20) NOT NULL,
  `ksupplier` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laba`
--

CREATE TABLE `laba` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `total_kas` int(20) NOT NULL,
  `total_hutang` int(20) NOT NULL,
  `total_piutang` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `panjar`
--

CREATE TABLE `panjar` (
  `kode_p` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `panjar` int(20) NOT NULL,
  `sumber` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kode_p` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `supplier` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `kebutuhan` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `material` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `alat` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `satuan` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `qty` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `kode_piutang` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pproyek`
--

CREATE TABLE `pproyek` (
  `kode_pp` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `kode` int(2) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `direktur` varchar(50) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `rek` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`kode`, `nama`, `alamat`, `direktur`, `telpon`, `fax`, `email`, `npwp`, `rek`, `foto`) VALUES
(1, 'asassas', 'sassas', 'sasas', '1', '212', 'as', 'sa', 'sa', 'IMG_20171219_093105.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `kode` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `kategori` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `spk` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `po` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `bo` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `lama` int(5) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `nilai` int(20) NOT NULL,
  `pph` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rab`
--

CREATE TABLE `rab` (
  `no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `kproyek` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kpekerjaan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `kodeSP` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `ksatuan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `volume` int(10) NOT NULL,
  `upah` int(20) NOT NULL,
  `material` int(10) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `subtotal` int(20) NOT NULL,
  `fee` int(10) NOT NULL,
  `total` int(20) NOT NULL,
  `ppn` int(10) NOT NULL,
  `seluruh` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `kode_s` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `stok` int(20) NOT NULL,
  `supplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas`
--

CREATE TABLE `tb_kas` (
  `kd_kas` int(20) NOT NULL,
  `jenis` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_muatan`
--

CREATE TABLE `tb_muatan` (
  `kode` int(11) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `kd_barang` varchar(25) NOT NULL,
  `awal` varchar(25) NOT NULL,
  `bongkar` int(11) NOT NULL,
  `selisih` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `panjar` int(20) NOT NULL,
  `sisa` int(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_muatan`
--

INSERT INTO `tb_muatan` (`kode`, `supir`, `no_hp`, `kd_barang`, `awal`, `bongkar`, `selisih`, `total`, `panjar`, `sisa`, `tujuan`, `ket`) VALUES
(13, 'wq', '1', '1', '1', 22, 2, 2, 2, 2, 'w', 'e');

--
-- Trigger `tb_muatan`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `tb_muatan` FOR EACH ROW BEGIN

   UPDATE tb_barang SET stok = stok + old.bongkar

   WHERE kd_barang = old.kd_barang;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `t_keluar` AFTER INSERT ON `tb_muatan` FOR EACH ROW BEGIN

   UPDATE tb_barang SET stok = stok - NEW.bongkar

   WHERE kd_barang = NEW.kd_barang;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','User') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'JASAKODING', 'admin', '123', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `alamat` text COLLATE utf8mb4_bin NOT NULL,
  `telpon` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `pic` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `bank` int(25) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `hb`
--
ALTER TABLE `hb`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `hs`
--
ALTER TABLE `hs`
  ADD PRIMARY KEY (`kode_hs`);

--
-- Indexes for table `laba`
--
ALTER TABLE `laba`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `panjar`
--
ALTER TABLE `panjar`
  ADD PRIMARY KEY (`kode_p`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode_p`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`kode_piutang`);

--
-- Indexes for table `pproyek`
--
ALTER TABLE `pproyek`
  ADD PRIMARY KEY (`kode_pp`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`kode_s`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`kd_kas`);

--
-- Indexes for table `tb_muatan`
--
ALTER TABLE `tb_muatan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `hb`
--
ALTER TABLE `hb`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hs`
--
ALTER TABLE `hs`
  MODIFY `kode_hs` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `panjar`
--
ALTER TABLE `panjar`
  MODIFY `kode_p` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `kode_p` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `kode_piutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pproyek`
--
ALTER TABLE `pproyek`
  MODIFY `kode_pp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `kode` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `kode_s` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `kd_kas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_muatan`
--
ALTER TABLE `tb_muatan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
