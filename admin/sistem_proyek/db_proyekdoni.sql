-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 16 Jan 2022 pada 03.42
-- Versi Server: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyekdoni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`kode`, `nama`) VALUES
('12', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ksatuan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ksupplier` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(20) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `kode` int(20) NOT NULL,
  `jenis` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`kode`, `jenis`, `nama`, `nominal`, `ket`) VALUES
(2, 'Biaya Umum', '200', 300, '0'),
(3, 'Biaya Umum', 'asa', 900, 'uu'),
(4, 'Biaya Umum', 'as', 300, '7'),
(5, 'Biaya Umum', '11', 400, 'uyu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `retensi` int(3) NOT NULL,
  `nilai` int(20) NOT NULL,
  `catatan` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `developer`
--

CREATE TABLE `developer` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `pic` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `bank` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `droping`
--

CREATE TABLE `droping` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(20) NOT NULL,
  `penerima` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hb`
--

CREATE TABLE `hb` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs`
--

CREATE TABLE `hs` (
  `kode` int(20) NOT NULL,
  `ksupplier` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `hs`
--

INSERT INTO `hs` (`kode`, `ksupplier`, `nominal`, `ket`) VALUES
(2, '1', 1, '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jatuh` date NOT NULL,
  `ksupplier` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nominal` int(20) NOT NULL,
  `status` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `norek` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `kode` int(11) NOT NULL,
  `ma` varchar(20) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keluar` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`kode`, `ma`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`) VALUES
(101, '2', 'Syafri Anwar Donatur Bulanan', '2016-04-06', '100000', 'Masuk', ''),
(102, '12', 'Infak Jifis Harian', '2016-04-06', '21000', 'Masuk', ''),
(103, '', 'Hamba Allah Semen Padang', '2016-04-06', '100000', 'Masuk', ''),
(104, '', 'Ana T Sandal', '2016-04-06', '400000', 'Masuk', ''),
(105, '', 'Honor Mubaligh 060416', '2016-04-06', '', 'Keluar', '50000'),
(106, '', 'Infak Jifis Harian', '2016-04-07', '283000', 'Masuk', ''),
(107, '1', 'Honor Mubaligh', '2016-04-07', '', 'Keluar', '125000'),
(109, '', 'Infak Jummat', '2016-04-08', '2000000', 'Masuk', ''),
(110, '', '', '0000-00-00', '', 'Masuk', '');

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

--
-- Dumping data untuk tabel `laba`
--

INSERT INTO `laba` (`kode`, `total_kas`, `total_hutang`, `total_piutang`) VALUES
('Biaya Umum', 200, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `kd_user` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`, `nama`, `alamat`) VALUES
(11, 'admin', 'admin', 'administrator', 'jl.berok raya no 40 siteba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ksatuan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ksupplier` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jenis` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(20) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `panjar`
--

CREATE TABLE `panjar` (
  `kode` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `panjar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kode` int(20) NOT NULL,
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

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`kode`, `kproyek`, `supplier`, `kebutuhan`, `material`, `alat`, `satuan`, `qty`, `harga`, `total`, `status`, `ket`) VALUES
(2, '', '2', '2', '2', '2', '2', 2, 2, 2, 'PO', '2'),
(3, '1', '1', '1', '1', '1', '1', 1, 1, 1, 'DO', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`kode`, `nominal`, `ket`) VALUES
(2, 3, '44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `kode` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`kode`, `kproyek`, `nominal`, `ket`) VALUES
(2, '1', 100, 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pproyek`
--

CREATE TABLE `pproyek` (
  `kode` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `pproyek`
--

INSERT INTO `pproyek` (`kode`, `kproyek`, `nominal`, `ket`) VALUES
(2, '1', 22, '388');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `kode` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `kategori` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `kd_dev` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `spk` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `po` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `bo` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `lama` int(5) NOT NULL,
  `mulai` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `selesai` varchar(25) COLLATE utf8mb4_bin NOT NULL,
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
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `norek` int(11) NOT NULL,
  `nama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `akun` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `serah`
--

CREATE TABLE `serah` (
  `kode` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `catatan` text COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `kode` int(20) NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_pekerjaan`
--

CREATE TABLE `sub_pekerjaan` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kpekerjaan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `pic` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `bank` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode`, `kategori`, `nama`, `alamat`, `telpon`, `email`, `pic`, `bank`, `ket`) VALUES
('1', 'kt', 'nm', 'al', '08', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(1, 1, 1, 'Kepala Keluarga'),
(2, 1, 2, 'Istri'),
(3, 2, 3, 'Kepala Keluarga'),
(4, 2, 4, 'Istri'),
(5, 3, 6, 'Kepala Keluarga'),
(6, 3, 7, 'Istri'),
(7, 1, 5, 'Anak'),
(9, 3, 8, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datang`
--

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL,
  `alamat_asal` text NOT NULL,
  `file_ket` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_datang`
--

INSERT INTO `tb_datang` (`id_datang`, `nik`, `nama_datang`, `jekel`, `tgl_datang`, `pelapor`, `alamat_asal`, `file_ket`, `file_ktp`) VALUES
(3, '112', 'adi', 'PR', '2021-02-26', 2, 'asd', '20201220_063815.jpg', '20201220_063808.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dusun`
--

CREATE TABLE `tb_dusun` (
  `id_dusun` int(5) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_dusun`
--

INSERT INTO `tb_dusun` (`id_dusun`, `nama_dusun`) VALUES
(6, ''),
(7, ''),
(8, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas`
--

CREATE TABLE `tb_kas` (
  `kd_kas` int(20) NOT NULL,
  `umum` int(20) NOT NULL,
  `lain` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tb_kas`
--

INSERT INTO `tb_kas` (`kd_kas`, `umum`, `lain`) VALUES
(2, 200, 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `file_nikah` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `desa`, `rt`, `rw`, `kec`, `kab`, `prov`, `file_nikah`, `file_ktp`) VALUES
(1, '1010202030304040', 'Juprianto', 'Majujaya', '01', '02', 'Semarang', 'Semarang', 'Jawa Tengahh', '20201220_063235.jpg', '20210117_191257.jpg'),
(2, '1010202030304012', 'Hardi', 'Majujaya', '02', '02', 'Semarang', 'Semarang', 'Jawa Tengahh', '', ''),
(3, '1010202030301111', 'Supardi', 'Majujaya', '02', '02', 'Semarang', 'Semarang', 'Jawa Tengahh', '', ''),
(4, '12300000000000321', 'Ahmad', 'Majujaya', '02', '02', 'Semarang', 'Semarang', 'Jawa Tengahh', '', ''),
(6, '1212', 'sas', 'sas', '1', '1', '1', 'qw', 'wqw', '20201220_062942.jpg', ''),
(7, '32323', 'sd', 'dsd', '1', '1', 'asa', 'sas', 'sas', '20201220_063202.jpg', ''),
(8, '121212', 'asa', 'sas', '1', '1', 'sas', 'sas', 'sas', '20201220_063808.jpg', '20210117_134417.jpg'),
(9, '23232', 'as', 'sas', '1', '1', 'asa', 'sa', 'sa', '20201220_063411.jpg', '20201220_063425.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahir`
--

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lh` text NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kk` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_ayah` varchar(25) NOT NULL,
  `nama_ibu` varchar(25) NOT NULL,
  `file_nikah` varchar(100) NOT NULL,
  `file_lahir` varchar(100) NOT NULL,
  `file_kk` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lahir`
--

INSERT INTO `tb_lahir` (`id_lahir`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `id_kk`, `nik`, `nama_ayah`, `nama_ibu`, `file_nikah`, `file_lahir`, `file_kk`, `file_ktp`) VALUES
(1, 'Ahmad Yusuf', 'sas', '2020-09-21', '', 4, '1212', 'as', 'sas', '20201220_063211.jpg', '20201220_063211.jpg', '20201220_063211.jpg', '20201220_063211.jpg'),
(2, 'a', 'a', '2021-02-11', '', 1, '1', 'a', 'a', '', '', '', ''),
(3, 'a', 'a', '2021-02-05', '', 3, '1', 'a', 'a', '', '', '', ''),
(4, 'a', 'sas', '2021-02-05', '', 6, '111', 'as', 'as', '20210117_191420.jpg', '20210117_191459.jpg', '20210117_191459.jpg', '20210117_191459.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mendu`
--

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `file_sk` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mendu`
--

INSERT INTO `tb_mendu` (`id_mendu`, `id_pdd`, `tgl_mendu`, `sebab`, `file_sk`) VALUES
(1, 6, '2020-09-21', 'Usia Tua', '20201220_063246.jpg'),
(2, 1, '2021-02-13', '1', '1'),
(3, 2, '2021-03-04', '1', '1'),
(4, 4, '2021-02-12', 'as', '20201220_063202.jpg'),
(5, 3, '2021-02-06', 'sasasas', '20201220_063202.jpg'),
(6, 5, '2021-02-13', 'sasasas', '20201220_063207.jpg'),
(7, 8, '2021-02-26', 'sakit', '20201220_063211.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(5) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `desa` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `kab` varchar(25) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `negara` varchar(25) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `gol_darah` varchar(3) NOT NULL,
  `status` enum('Ada','Meninggal','Pindah') NOT NULL,
  `file_kk` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `alamat`, `umur`, `rt`, `rw`, `desa`, `kec`, `kab`, `prov`, `negara`, `agama`, `kawin`, `pekerjaan`, `gol_darah`, `status`, `file_kk`) VALUES
(2, '3318090603080012', 'Anita', 'Kudus', '2020-09-02', 'PR', '1', 0, '01', '02', 'a', 'sa', 's', 'sa', 'sa', 'Islam', 'Sudah', 'Ibu Rumah Tangga', 'sa', 'Ada', '20201220_063211.jpg'),
(3, '3318091907080001', 'Hardi', 'Kudus', '2020-09-10', 'LK', '', 0, '02', '02', '', '', '', '', '', 'Islam', 'Sudah', 'Petani', '', 'Meninggal', ''),
(4, '3318091907080022', 'Sawilah', 'Semarang', '2020-09-01', 'PR', '', 0, '01', '04', '', '', '', '', '', 'Islam', 'Sudah', 'Ibu Rumah Tangga', '', 'Meninggal', ''),
(5, '3318090603080123', 'Ali Ahmadi', 'Semarang', '2020-09-01', 'LK', '', 0, '01', '03', '', '', '', '', '', 'Islam', 'Belum', 'Pelajar', '', 'Meninggal', ''),
(6, '3318091907080001', 'Supardi', 'kudus', '2020-09-01', 'LK', '', 0, '01', '04', '', '', '', '', '', 'Islam', 'Sudah', 'Petani', '', 'Meninggal', ''),
(7, '3318091907080007', 'Suparmi', 'Semarang', '2020-09-03', 'PR', '', 0, '01', '01', '', '', '', '', '', 'Kristen', 'Sudah', 'Ibu Rumah Tangga', '', 'Pindah', ''),
(8, '3318090603080045', 'Rojali', 'Semarang', '2020-09-01', 'LK', '', 0, '01', '02', '', '', '', '', '', 'Islam', 'Sudah', 'PNS', '', 'Meninggal', ''),
(16, '12', 'as', 'as', '2021-02-11', '', 'as', 0, '1', '1', 'as', '', '', '', '', 'Islam', 'Sudah', 'asas', 'O', 'Ada', '20210117_191451.jpg'),
(17, '1212121', 'sa', 'as', '2021-02-10', '', 'asa', 0, '1', '1', 'as', '', '', '', '', 'Islam', 'Sudah', 'asas', 'O', 'Ada', '20210117_191424.jpg'),
(18, '2343434', 'aasas', 'sass', '2021-02-24', '', 'sas', 0, '1', '1', 'as', 'sa', 'as', 'sa', 'as', 'Islam', 'Cerai Hidup', 'asas', 'O', 'Ada', '20210118_224124.jpg'),
(20, '1', 'a', 'a', '0000-00-00', '', '1', 1, '1', '1', 'a', 'a', 'a', 'a', 'a', 'Islam', 'Sudah', 'a', 'A', 'Ada', 'IMG_20171218_085852.jpg'),
(21, 'q', 'a', 'a', '0000-00-00', '', 'a', 1, '1', '11', 'a', 'a', 'a', 'a', 'a', 'Islam', 'Sudah', 'a', 'O', 'Ada', 'IMG_20180123_114641.jpg'),
(22, '33180906030800122', 'a', 'a', '0000-00-00', '', 'a', 2, '1', '1', 'a', 'a', 'a', 'a', 'a', 'Islam', 'Sudah', 'a', 'O', 'Ada', 'IMG_20180123_114641.jpg'),
(23, '3318090603080012222', 'a', 'a', '0000-00-00', '', 'a', 22, '11', '11', 'a', 'a', 'a', 'a', 'a', 'Islam', 'Sudah', 'a', 'O', 'Ada', '20210118_224124.jpg'),
(24, '123', 'a', 'a', '2021-03-03', '', 'a', 22, '12', '12', 'a', 'a', 'a', 'a', 'a', 'Islam', 'Sudah', 'a', 'O', 'Ada', '20201220_063246.jpg'),
(25, '332213232', 'a', 'aa', '2021-03-03', 'LK', 'a', 22, '11', '11', 'a', 'a', 'aa', 'a', 'a', 'Islam', 'Sudah', 'a', 'O', 'Ada', '20210117_191451.jpg'),
(26, '3318090603080012', 'a', 'a', '2021-03-05', 'LK', 'q', 22, '11', '11', 'q', 'q', 'q', 'q', 'q', 'Islam', 'Sudah', 'q', 'O', 'Ada', 'IMG_20171217_191221.jpg');

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
(1, 'Zainal A', 'admin', '1', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pindah`
--

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `alamat_tujuan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pindah`
--

INSERT INTO `tb_pindah` (`id_pindah`, `id_pdd`, `tgl_pindah`, `alasan`, `alamat_tujuan`) VALUES
(1, 7, '2020-09-20', 'Kerja', '1'),
(2, 2, '2021-02-23', '1', '1');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `termin`
--

CREATE TABLE `termin` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tagih` date NOT NULL,
  `jatuh` date NOT NULL,
  `no` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `retensi` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `progres` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nilai` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `term` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `overdue` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `norek` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

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
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `laba`
--
ALTER TABLE `laba`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `panjar`
--
ALTER TABLE `panjar`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pproyek`
--
ALTER TABLE `pproyek`
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
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_datang`
--
ALTER TABLE `tb_datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`kd_kas`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  ADD PRIMARY KEY (`id_lahir`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  ADD PRIMARY KEY (`id_mendu`),
  ADD KEY `id_pdd` (`id_pdd`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pdd` (`id_pdd`);

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
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hb`
--
ALTER TABLE `hb`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hs`
--
ALTER TABLE `hs`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `panjar`
--
ALTER TABLE `panjar`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pproyek`
--
ALTER TABLE `pproyek`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_datang`
--
ALTER TABLE `tb_datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  MODIFY `id_dusun` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `kd_kas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_lahir`
--
ALTER TABLE `tb_lahir`
  MODIFY `id_lahir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_mendu`
--
ALTER TABLE `tb_mendu`
  MODIFY `id_mendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pindah`
--
ALTER TABLE `tb_pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
