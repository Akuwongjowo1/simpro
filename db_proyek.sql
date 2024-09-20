-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2024 pada 08.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `kode` int(20) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`kode`, `jenis`, `nominal`, `tgl`, `ket`) VALUES
(8, 'Anggaran Makan', 2000, '2024-01-06', 'Makan ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` text NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp(),
  `tgl_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_kategori` varchar(20) NOT NULL,
  `merk` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `nama_barang`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`, `id_kategori`, `merk`) VALUES
(1, 'BR001', 'Pensil', '1500', '3000', 'PCS', '59', '0000-00-00 00:00:00', '2024-02-28 14:23:38', '', ''),
(2, 'BR002', 'Sabun', '1800', '3000', 'PCS', '24', '0000-00-00 00:00:00', '2024-02-28 14:23:38', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_keluar` int(5) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `tujuan` varchar(25) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-new.jumlah
WHERE id_barang=new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(5) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `supplier` varchar(25) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+new.jumlah
WHERE id_barang=new.kd_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(1, 1, 6, 'tes', '2024-01-11 01:00:06', 1),
(2, 7, 6, 'tes dulu', '2024-01-11 01:05:41', 0),
(3, 6, 7, 'iya ada apa.?', '2024-01-11 01:15:07', 0),
(4, 8, 6, 'tes', '2024-01-15 01:56:08', 0),
(5, 8, 6, 'masuk gak', '2024-01-15 01:56:13', 0),
(6, 7, 8, 'tes aja', '2024-01-15 02:21:45', 0),
(7, 6, 7, 'tes ui', '2024-01-15 02:24:39', 1),
(8, 8, 7, 'makan', '2024-01-15 02:25:01', 0),
(9, 9, 7, 'udah', '2024-01-15 02:25:11', 0),
(10, 9, 7, 'tes', '2024-02-15 15:26:01', 0),
(11, 8, 9, 'tes', '2024-02-16 08:19:25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hb`
--

CREATE TABLE `hb` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hs`
--

CREATE TABLE `hs` (
  `kode_hs` int(20) NOT NULL,
  `ksupplier` varchar(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `kd_inventaris` int(11) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`kd_inventaris`, `kd_barang`, `satuan`, `jumlah`, `sisa`, `tgl`) VALUES
(1, 'B01', 'Pcs', 20, 20, '2024-01-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2017, 10:23'),
(5, 'Sabun', '7 May 2017, 10:28'),
(6, 'Snack', '6 October 2020, 0:19'),
(7, 'Minuman', '6 October 2020, 0:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laba`
--

CREATE TABLE `laba` (
  `kode` varchar(20) NOT NULL,
  `total_kas` int(20) NOT NULL,
  `total_hutang` int(20) NOT NULL,
  `total_piutang` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `laba`
--

INSERT INTO `laba` (`kode`, `total_kas`, `total_hutang`, `total_piutang`) VALUES
('Anggaran Makan', 0, 0, 0),
('ayu', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` char(32) NOT NULL,
  `id_member` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`user_id`, `username`, `pass`, `id_member`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 0, '2024-01-11 00:38:10', 'no'),
(2, 0, '2024-01-11 01:06:22', 'no'),
(3, 7, '2024-01-11 01:07:21', 'no'),
(4, 7, '2024-01-11 01:09:04', 'no'),
(5, 7, '2024-01-11 01:13:03', 'no'),
(6, 8, '2024-01-11 01:13:55', 'no'),
(7, 9, '2024-01-11 01:14:37', 'no'),
(8, 7, '2024-01-11 01:15:19', 'no'),
(9, 8, '2024-01-11 01:45:09', 'no'),
(10, 7, '2024-01-11 01:48:07', 'no'),
(11, 9, '2024-01-11 01:50:17', 'no'),
(12, 8, '2024-01-15 01:29:33', 'no'),
(13, 6, '2024-01-15 01:56:21', 'no'),
(14, 8, '2024-01-15 02:15:11', 'no'),
(15, 8, '2024-01-15 02:21:52', 'no'),
(16, 7, '2024-01-15 02:25:15', 'no'),
(17, 6, '2024-01-15 02:25:22', 'no'),
(18, 9, '2024-01-15 02:26:00', 'no'),
(19, 8, '2024-01-15 02:32:25', 'no'),
(20, 6, '2024-01-15 02:32:36', 'no'),
(21, 6, '2024-01-20 02:49:09', 'no'),
(22, 9, '2024-01-20 03:42:15', 'no'),
(23, 8, '2024-01-20 03:44:23', 'no'),
(24, 7, '2024-01-20 03:48:55', 'no'),
(25, 9, '2024-01-20 03:49:06', 'no'),
(26, 6, '2024-01-20 03:55:40', 'no'),
(27, 6, '2024-02-04 01:56:53', 'no'),
(28, 9, '2024-02-13 01:25:28', 'no'),
(29, 8, '2024-02-13 01:25:58', 'no'),
(30, 9, '2024-02-13 01:26:58', 'no'),
(31, 8, '2024-02-13 01:27:57', 'no'),
(32, 8, '2024-02-13 23:28:23', 'no'),
(33, 8, '2024-02-13 23:55:04', 'no'),
(34, 8, '2024-02-15 00:09:19', 'no'),
(35, 6, '2024-02-15 13:59:09', 'no'),
(36, 8, '2024-02-15 14:03:12', 'no'),
(37, 7, '2024-02-15 14:18:44', 'no'),
(38, 9, '2024-02-15 14:20:54', 'no'),
(39, 7, '2024-02-15 15:26:50', 'no'),
(40, 8, '2024-02-15 15:26:59', 'no'),
(41, 7, '2024-02-15 15:29:12', 'no'),
(42, 8, '2024-02-15 23:40:38', 'no'),
(43, 9, '2024-02-16 00:16:02', 'no'),
(44, 9, '2024-02-16 00:25:02', 'no'),
(45, 8, '2024-02-16 00:25:17', 'no'),
(46, 8, '2024-02-16 00:28:54', 'no'),
(47, 9, '2024-02-16 00:44:29', 'no'),
(48, 9, '2024-02-16 00:55:50', 'no'),
(49, 7, '2024-02-16 00:57:28', 'no'),
(50, 9, '2024-02-16 01:01:48', 'no'),
(51, 8, '2024-02-16 04:11:15', 'no'),
(52, 7, '2024-02-16 04:11:25', 'no'),
(53, 6, '2024-02-16 04:36:48', 'no'),
(54, 8, '2024-02-16 06:24:04', 'no'),
(55, 9, '2024-02-16 07:08:34', 'no'),
(56, 7, '2024-02-16 07:53:07', 'no'),
(57, 8, '2024-02-16 08:16:11', 'no'),
(58, 9, '2024-02-16 08:19:25', 'no'),
(59, 8, '2024-02-16 08:23:38', 'no'),
(60, 9, '2024-02-16 08:39:10', 'no'),
(61, 7, '2024-02-16 08:40:43', 'no'),
(62, 6, '2024-02-16 11:39:50', 'no'),
(63, 8, '2024-02-16 12:33:42', 'no'),
(64, 7, '2024-02-27 13:25:31', 'no'),
(65, 7, '2024-02-28 13:31:34', 'no'),
(66, 9, '2024-02-28 13:57:59', 'no'),
(67, 7, '2024-02-28 14:32:31', 'no'),
(68, 7, '2024-02-28 14:34:29', 'no'),
(69, 9, '2024-02-28 14:34:41', 'no'),
(70, 9, '2024-02-29 22:58:00', 'no'),
(71, 7, '2024-02-29 23:06:02', 'no'),
(72, 6, '2024-03-30 09:24:50', 'no'),
(73, 7, '2024-03-30 09:30:45', 'no'),
(74, 8, '2024-03-30 09:33:08', 'no'),
(75, 6, '2024-03-30 09:33:52', 'no'),
(76, 6, '2024-04-01 04:42:36', 'no'),
(77, 7, '2024-04-02 01:09:20', 'no'),
(78, 9, '2024-04-02 01:10:16', 'no'),
(79, 7, '2024-04-02 01:10:44', 'no'),
(80, 6, '2024-04-02 01:11:27', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat_member` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gambar` text NOT NULL,
  `NIK` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`, `email`, `gambar`, `NIK`) VALUES
(1, 'Fauzan Falah', 'uj harapan', '081234567890', 'example@gmail.com', 'unnamed.jpg', '12314121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` varchar(25) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `catatan` text NOT NULL,
  `proyek` text NOT NULL,
  `pengawas` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Baru',
  `supplier` text NOT NULL,
  `pesan` int(5) NOT NULL,
  `tujuan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `panjar`
--

CREATE TABLE `panjar` (
  `kode_p` int(20) NOT NULL,
  `kproyek` varchar(20) NOT NULL,
  `panjar` int(20) NOT NULL,
  `sumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `kode_p` int(20) NOT NULL,
  `kproyek` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `ket` text NOT NULL,
  `progres` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `foto2` text NOT NULL,
  `foto3` text NOT NULL,
  `foto4` text NOT NULL,
  `foto5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`kode_p`, `kproyek`, `status`, `ket`, `progres`, `tgl`, `foto`, `foto2`, `foto3`, `foto4`, `foto5`) VALUES
(10, 'P01', 'Proses', 'makan', 0, '2024-01-31', 'dokumentasi_1708043458.png', 'dokumentasi2_1708043458.png', 'dokumentasi3_1708043458.png', 'dokumentasi4_1708043458.png', 'dokumentasi5_1708043458.png');

--
-- Trigger `pekerjaan`
--
DELIMITER $$
CREATE TRIGGER `hapus_progress` AFTER DELETE ON `pekerjaan` FOR EACH ROW BEGIN
update proyek set progress=progress-OLD.progres
where kode=OLD.kproyek;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `progress` AFTER INSERT ON `pekerjaan` FOR EACH ROW BEGIN
update proyek set progress=progress+NEW.progres
where kode=NEW.kproyek;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pemesanan` int(25) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(25) NOT NULL,
  `admin` varchar(25) NOT NULL,
  `pengawas` varchar(25) NOT NULL,
  `lapangan` varchar(25) NOT NULL,
  `status_admin` varchar(25) NOT NULL,
  `supplier` varchar(25) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`kd_pemesanan`, `kd_barang`, `jumlah`, `satuan`, `tgl`, `status`, `admin`, `pengawas`, `lapangan`, `status_admin`, `supplier`, `ket`) VALUES
(1, 'asas', 2, 'Pcs', '2024-01-20 03:54:55', 'Ditolak', '', 'Pengawas', '', '', '', 'Pesanan Dari Pengawas Ditolak Oleh Admin Lapangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `kode` int(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` varchar(25) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `kode_piutang` int(20) NOT NULL,
  `kproyek` varchar(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pproyek`
--

CREATE TABLE `pproyek` (
  `kode_pp` int(20) NOT NULL,
  `kproyek` varchar(20) NOT NULL,
  `nominal` int(20) NOT NULL,
  `tgl` date NOT NULL,
  `keterangan` text NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`kode`, `nama`, `alamat`, `direktur`, `telpon`, `fax`, `email`, `npwp`, `rek`, `foto`) VALUES
(1, 'PT XYZ', 'Jakarta', 'Ahmad', '0819', '08121212', 'a@gmail.com', '0182323', 'sa', 'antarmuka.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `nilai` int(20) NOT NULL,
  `pengawas` varchar(50) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `p_jawab` varchar(50) NOT NULL,
  `kontraktor` varchar(50) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`kode`, `nama`, `mulai`, `selesai`, `nilai`, `pengawas`, `admin`, `p_jawab`, `kontraktor`, `progress`, `gambar`, `keterangan`) VALUES
(10, 'Membangun Jembatan', '2024-04-02', '2024-04-11', 250000000, 'Ahmad Zainuri', 'Budi', 'Susi', 'PT Abadi Makmur', 0, '1712040944_660babf0c26ca.jpg', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rab`
--

CREATE TABLE `rab` (
  `no` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `kproyek` varchar(15) NOT NULL,
  `kpekerjaan` varchar(15) NOT NULL,
  `kodeSP` varchar(15) NOT NULL,
  `ksatuan` varchar(15) NOT NULL,
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
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `tgl` date NOT NULL,
  `status_sewa` varchar(25) NOT NULL DEFAULT 'Sewa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_alat`, `jumlah`, `nama`, `telpon`, `tgl`, `status_sewa`) VALUES
(3, '1', 2, 'adi', '08', '2024-04-02', 'Sewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `kode_s` int(20) NOT NULL,
  `kproyek` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen`
--

CREATE TABLE `tb_absen` (
  `kd_absen` int(5) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kode_p` varchar(20) NOT NULL,
  `kd_pekerjaan` varchar(20) NOT NULL,
  `kd_karyawan` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_absen`
--

INSERT INTO `tb_absen` (`kd_absen`, `tgl`, `kode_p`, `kd_pekerjaan`, `kd_karyawan`, `status`) VALUES
(3, '2024-02-16 00:37:48', 'P01', '10', 'K01', 'Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_alat`
--

CREATE TABLE `tb_alat` (
  `id_alat` varchar(20) NOT NULL,
  `nama_alat` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_alat`
--

INSERT INTO `tb_alat` (`id_alat`, `nama_alat`, `jenis`, `merk`, `harga`, `status`) VALUES
('1', 'Traktor', 'Roda 4', 'Toyota', 250000, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_balasan`
--

CREATE TABLE `tb_balasan` (
  `id_pesan` varchar(20) NOT NULL,
  `balasan` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_balasan`
--

INSERT INTO `tb_balasan` (`id_pesan`, `balasan`, `tgl`) VALUES
('sas', 'ass', '2024-01-10 12:28:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `stok` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nama`, `harga`, `satuan`, `stok`) VALUES
('B003', 'a', 2, 'Pcs', 23),
('B01', 'Baju', 2000, 'Pcs', 2800),
('B02', 'Celana', 2000, 'Pcs', 2200),
('B04', 'dsd', 454, 'Pcs', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `kode` varchar(20) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`kode`, `nama_karyawan`, `alamat`, `telpon`, `jabatan`) VALUES
('K01', 'adi', 'Jakarta', '08121112231', 'Staff'),
('K02', 'Susi', 'Bandung', '08122434', 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kas`
--

CREATE TABLE `tb_kas` (
  `kd_kas` int(20) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tb_kas`
--

INSERT INTO `tb_kas` (`kd_kas`, `jenis`, `kategori`) VALUES
(3, 'Anggaran Makan', 'Biaya Umum'),
(4, 'Anggaran Makan', 'Biaya Umum'),
(5, 'Anggaran Makan', 'Biaya Lainnya'),
(6, 'Anggaran Makan', 'Biaya Umum'),
(7, 'Anggaran Makan', 'Biaya Umum'),
(8, 'Anggaran Makan', 'Biaya Umum'),
(9, 'ayu', 'Biaya Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontraktor`
--

CREATE TABLE `tb_kontraktor` (
  `kode` varchar(20) NOT NULL,
  `nama_kontraktor` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kontraktor`
--

INSERT INTO `tb_kontraktor` (`kode`, `nama_kontraktor`, `alamat`, `telpon`) VALUES
('1', 'PT Abadi Makmur', 'Jakarta081211112231', '081211112231');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  `level` enum('Admin Kantor','Admin Lapangan','Pengawas','Pimpinan') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(7, 'Budi', 'kantor', '123', 'Admin Kantor'),
(6, 'Ahmad Zainuri', 'pimpinan', '123', 'Pimpinan'),
(8, 'Susi', 'pengawas', '123', 'Pengawas'),
(9, 'Adi', 'lapangan', '123', 'Admin Lapangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `pengirim` varchar(20) NOT NULL,
  `balasan` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `tujuan`, `perihal`, `isi`, `pengirim`, `balasan`, `file`, `tgl`) VALUES
(3, '7', 'sas', 'sas', '7', '', 'pesan_1704700126.png', '2024-01-08 07:57:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode` varchar(20) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `bank` int(25) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode`, `kategori`, `nama`, `alamat`, `telpon`, `email`, `pic`, `bank`, `ket`) VALUES
('S01', 'Jasa', 'PT alami', '', '08121221', '', '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`) VALUES
(1, 'CV Daruttaqwa', 'Ujung Harapan', '081234567890', 'Fauzan Falah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indeks untuk tabel `hb`
--
ALTER TABLE `hb`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `hs`
--
ALTER TABLE `hs`
  ADD PRIMARY KEY (`kode_hs`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`kd_inventaris`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `laba`
--
ALTER TABLE `laba`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `panjar`
--
ALTER TABLE `panjar`
  ADD PRIMARY KEY (`kode_p`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`kode_p`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`kode_piutang`);

--
-- Indeks untuk tabel `pproyek`
--
ALTER TABLE `pproyek`
  ADD PRIMARY KEY (`kode_pp`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `rab`
--
ALTER TABLE `rab`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`kode_s`);

--
-- Indeks untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indeks untuk tabel `tb_alat`
--
ALTER TABLE `tb_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`kd_kas`);

--
-- Indeks untuk tabel `tb_muatan`
--
ALTER TABLE `tb_muatan`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `hb`
--
ALTER TABLE `hb`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hs`
--
ALTER TABLE `hs`
  MODIFY `kode_hs` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `kd_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `panjar`
--
ALTER TABLE `panjar`
  MODIFY `kode_p` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `kode_p` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `kode` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `piutang`
--
ALTER TABLE `piutang`
  MODIFY `kode_piutang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pproyek`
--
ALTER TABLE `pproyek`
  MODIFY `kode_pp` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `kode` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `kode_s` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `kd_absen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `kd_kas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_muatan`
--
ALTER TABLE `tb_muatan`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
