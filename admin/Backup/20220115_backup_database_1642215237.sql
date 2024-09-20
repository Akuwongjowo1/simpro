DROP TABLE akun;

CREATE TABLE `akun` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO akun VALUES("12","1");



DROP TABLE alat;

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




DROP TABLE anggaran;

CREATE TABLE `anggaran` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO anggaran VALUES("2","Biaya Umum","200","300","0");
INSERT INTO anggaran VALUES("3","Biaya Umum","asa","900","uu");
INSERT INTO anggaran VALUES("4","Biaya Umum","as","300","7");
INSERT INTO anggaran VALUES("5","Biaya Umum","11","400","uyu");



DROP TABLE berita;

CREATE TABLE `berita` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `retensi` int(3) NOT NULL,
  `nilai` int(20) NOT NULL,
  `catatan` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE developer;

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




DROP TABLE droping;

CREATE TABLE `droping` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(20) NOT NULL,
  `penerima` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE hb;

CREATE TABLE `hb` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE hs;

CREATE TABLE `hs` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `ksupplier` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE hutang;

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




DROP TABLE kas;

CREATE TABLE `kas` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `ma` varchar(20) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keluar` varchar(20) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

INSERT INTO kas VALUES("101","2","Syafri Anwar Donatur Bulanan","2016-04-06","100000","Masuk","");
INSERT INTO kas VALUES("102","12","Infak Jifis Harian","2016-04-06","21000","Masuk","");
INSERT INTO kas VALUES("103","","Hamba Allah Semen Padang","2016-04-06","100000","Masuk","");
INSERT INTO kas VALUES("104","","Ana T Sandal","2016-04-06","400000","Masuk","");
INSERT INTO kas VALUES("105","","Honor Mubaligh 060416","2016-04-06","","Keluar","50000");
INSERT INTO kas VALUES("106","","Infak Jifis Harian","2016-04-07","283000","Masuk","");
INSERT INTO kas VALUES("107","1","Honor Mubaligh","2016-04-07","","Keluar","125000");
INSERT INTO kas VALUES("109","","Infak Jummat","2016-04-08","2000000","Masuk","");
INSERT INTO kas VALUES("110","","","0000-00-00","","Masuk","");



DROP TABLE laba;

CREATE TABLE `laba` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `total_kas` int(20) NOT NULL,
  `total_hutang` int(20) NOT NULL,
  `total_piutang` int(20) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO laba VALUES("Biaya Umum","200","0","0");



DROP TABLE login;

CREATE TABLE `login` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("11","admin","admin","administrator","jl.berok raya no 40 siteba");



DROP TABLE material;

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




DROP TABLE panjar;

CREATE TABLE `panjar` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `panjar` int(20) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE pekerjaan;

CREATE TABLE `pekerjaan` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
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
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO pekerjaan VALUES("2","","2","2","2","2","2","2","2","2","PO","2");
INSERT INTO pekerjaan VALUES("3","1","1","1","1","1","1","1","1","1","DO","1");



DROP TABLE pengeluaran;

CREATE TABLE `pengeluaran` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO pengeluaran VALUES("2","3","44");



DROP TABLE piutang;

CREATE TABLE `piutang` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO piutang VALUES("2","1","100","a");



DROP TABLE pproyek;

CREATE TABLE `pproyek` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `kproyek` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `nominal` int(20) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO pproyek VALUES("2","1","22","388");



DROP TABLE proyek;

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
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE rab;

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
  `seluruh` int(20) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE rekening;

CREATE TABLE `rekening` (
  `norek` int(11) NOT NULL,
  `nama` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `akun` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE satuan;

CREATE TABLE `satuan` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE serah;

CREATE TABLE `serah` (
  `kode` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `catatan` text COLLATE latin1_general_ci NOT NULL,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE status;

CREATE TABLE `status` (
  `kode` int(20) NOT NULL AUTO_INCREMENT,
  `kproyek` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE sub_pekerjaan;

CREATE TABLE `sub_pekerjaan` (
  `kode` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `kpekerjaan` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;




DROP TABLE supplier;

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

INSERT INTO supplier VALUES("1","kt","nm","al","08","","","","");



DROP TABLE tb_anggota;

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `tb_anggota_ibfk_1` (`id_pend`),
  KEY `id_kk` (`id_kk`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tb_anggota VALUES("1","1","1","Kepala Keluarga");
INSERT INTO tb_anggota VALUES("2","1","2","Istri");
INSERT INTO tb_anggota VALUES("3","2","3","Kepala Keluarga");
INSERT INTO tb_anggota VALUES("4","2","4","Istri");
INSERT INTO tb_anggota VALUES("5","3","6","Kepala Keluarga");
INSERT INTO tb_anggota VALUES("6","3","7","Istri");
INSERT INTO tb_anggota VALUES("7","1","5","Anak");
INSERT INTO tb_anggota VALUES("9","3","8","Anak");



DROP TABLE tb_datang;

CREATE TABLE `tb_datang` (
  `id_datang` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) NOT NULL,
  `nama_datang` varchar(20) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `tgl_datang` date NOT NULL,
  `pelapor` int(11) NOT NULL,
  `alamat_asal` text NOT NULL,
  `file_ket` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_datang`),
  KEY `pelapor` (`pelapor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tb_datang VALUES("3","112","adi","PR","2021-02-26","2","asd","20201220_063815.jpg","20201220_063808.jpg");



DROP TABLE tb_dusun;

CREATE TABLE `tb_dusun` (
  `id_dusun` int(5) NOT NULL AUTO_INCREMENT,
  `nama_dusun` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dusun`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO tb_dusun VALUES("6","");
INSERT INTO tb_dusun VALUES("7","");
INSERT INTO tb_dusun VALUES("8","");



DROP TABLE tb_kas;

CREATE TABLE `tb_kas` (
  `kd_kas` int(20) NOT NULL AUTO_INCREMENT,
  `umum` int(20) NOT NULL,
  `lain` int(20) NOT NULL,
  PRIMARY KEY (`kd_kas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

INSERT INTO tb_kas VALUES("2","200","500");



DROP TABLE tb_kk;

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL AUTO_INCREMENT,
  `no_kk` varchar(30) NOT NULL,
  `kepala` varchar(20) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `kec` varchar(20) NOT NULL,
  `kab` varchar(20) NOT NULL,
  `prov` varchar(20) NOT NULL,
  `file_nikah` varchar(100) NOT NULL,
  `file_ktp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kk`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tb_kk VALUES("1","1010202030304040","Juprianto","Majujaya","01","02","Semarang","Semarang","Jawa Tengahh","20201220_063235.jpg","20210117_191257.jpg");
INSERT INTO tb_kk VALUES("2","1010202030304012","Hardi","Majujaya","02","02","Semarang","Semarang","Jawa Tengahh","","");
INSERT INTO tb_kk VALUES("3","1010202030301111","Supardi","Majujaya","02","02","Semarang","Semarang","Jawa Tengahh","","");
INSERT INTO tb_kk VALUES("4","12300000000000321","Ahmad","Majujaya","02","02","Semarang","Semarang","Jawa Tengahh","","");
INSERT INTO tb_kk VALUES("6","1212","sas","sas","1","1","1","qw","wqw","20201220_062942.jpg","");
INSERT INTO tb_kk VALUES("7","32323","sd","dsd","1","1","asa","sas","sas","20201220_063202.jpg","");
INSERT INTO tb_kk VALUES("8","121212","asa","sas","1","1","sas","sas","sas","20201220_063808.jpg","20210117_134417.jpg");
INSERT INTO tb_kk VALUES("9","23232","as","sas","1","1","asa","sa","sa","20201220_063411.jpg","20201220_063425.jpg");



DROP TABLE tb_lahir;

CREATE TABLE `tb_lahir` (
  `id_lahir` int(11) NOT NULL AUTO_INCREMENT,
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
  `file_ktp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lahir`),
  KEY `id_kk` (`id_kk`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tb_lahir VALUES("1","Ahmad Yusuf","sas","2020-09-21","","4","1212","as","sas","20201220_063211.jpg","20201220_063211.jpg","20201220_063211.jpg","20201220_063211.jpg");
INSERT INTO tb_lahir VALUES("2","a","a","2021-02-11","","1","1","a","a","","","","");
INSERT INTO tb_lahir VALUES("3","a","a","2021-02-05","","3","1","a","a","","","","");
INSERT INTO tb_lahir VALUES("4","a","sas","2021-02-05","","6","111","as","as","20210117_191420.jpg","20210117_191459.jpg","20210117_191459.jpg","20210117_191459.jpg");



DROP TABLE tb_mendu;

CREATE TABLE `tb_mendu` (
  `id_mendu` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_mendu` date NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `file_sk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mendu`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tb_mendu VALUES("1","6","2020-09-21","Usia Tua","20201220_063246.jpg");
INSERT INTO tb_mendu VALUES("2","1","2021-02-13","1","1");
INSERT INTO tb_mendu VALUES("3","2","2021-03-04","1","1");
INSERT INTO tb_mendu VALUES("4","4","2021-02-12","as","20201220_063202.jpg");
INSERT INTO tb_mendu VALUES("5","3","2021-02-06","sasasas","20201220_063202.jpg");
INSERT INTO tb_mendu VALUES("6","5","2021-02-13","sasasas","20201220_063207.jpg");
INSERT INTO tb_mendu VALUES("7","8","2021-02-26","sakit","20201220_063211.jpg");



DROP TABLE tb_pdd;

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL AUTO_INCREMENT,
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
  `file_kk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pend`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO tb_pdd VALUES("2","3318090603080012","Anita","Kudus","2020-09-02","PR","1","0","01","02","a","sa","s","sa","sa","Islam","Sudah","Ibu Rumah Tangga","sa","Ada","20201220_063211.jpg");
INSERT INTO tb_pdd VALUES("3","3318091907080001","Hardi","Kudus","2020-09-10","LK","","0","02","02","","","","","","Islam","Sudah","Petani","","Meninggal","");
INSERT INTO tb_pdd VALUES("4","3318091907080022","Sawilah","Semarang","2020-09-01","PR","","0","01","04","","","","","","Islam","Sudah","Ibu Rumah Tangga","","Meninggal","");
INSERT INTO tb_pdd VALUES("5","3318090603080123","Ali Ahmadi","Semarang","2020-09-01","LK","","0","01","03","","","","","","Islam","Belum","Pelajar","","Meninggal","");
INSERT INTO tb_pdd VALUES("6","3318091907080001","Supardi","kudus","2020-09-01","LK","","0","01","04","","","","","","Islam","Sudah","Petani","","Meninggal","");
INSERT INTO tb_pdd VALUES("7","3318091907080007","Suparmi","Semarang","2020-09-03","PR","","0","01","01","","","","","","Kristen","Sudah","Ibu Rumah Tangga","","Pindah","");
INSERT INTO tb_pdd VALUES("8","3318090603080045","Rojali","Semarang","2020-09-01","LK","","0","01","02","","","","","","Islam","Sudah","PNS","","Meninggal","");
INSERT INTO tb_pdd VALUES("16","12","as","as","2021-02-11","","as","0","1","1","as","","","","","Islam","Sudah","asas","O","Ada","20210117_191451.jpg");
INSERT INTO tb_pdd VALUES("17","1212121","sa","as","2021-02-10","","asa","0","1","1","as","","","","","Islam","Sudah","asas","O","Ada","20210117_191424.jpg");
INSERT INTO tb_pdd VALUES("18","2343434","aasas","sass","2021-02-24","","sas","0","1","1","as","sa","as","sa","as","Islam","Cerai Hidup","asas","O","Ada","20210118_224124.jpg");
INSERT INTO tb_pdd VALUES("20","1","a","a","0000-00-00","","1","1","1","1","a","a","a","a","a","Islam","Sudah","a","A","Ada","IMG_20171218_085852.jpg");
INSERT INTO tb_pdd VALUES("21","q","a","a","0000-00-00","","a","1","1","11","a","a","a","a","a","Islam","Sudah","a","O","Ada","IMG_20180123_114641.jpg");
INSERT INTO tb_pdd VALUES("22","33180906030800122","a","a","0000-00-00","","a","2","1","1","a","a","a","a","a","Islam","Sudah","a","O","Ada","IMG_20180123_114641.jpg");
INSERT INTO tb_pdd VALUES("23","3318090603080012222","a","a","0000-00-00","","a","22","11","11","a","a","a","a","a","Islam","Sudah","a","O","Ada","20210118_224124.jpg");
INSERT INTO tb_pdd VALUES("24","123","a","a","2021-03-03","","a","22","12","12","a","a","a","a","a","Islam","Sudah","a","O","Ada","20201220_063246.jpg");
INSERT INTO tb_pdd VALUES("25","332213232","a","aa","2021-03-03","LK","a","22","11","11","a","a","aa","a","a","Islam","Sudah","a","O","Ada","20210117_191451.jpg");
INSERT INTO tb_pdd VALUES("26","3318090603080012","a","a","2021-03-05","LK","q","22","11","11","q","q","q","q","q","Islam","Sudah","q","O","Ada","IMG_20171217_191221.jpg");



DROP TABLE tb_pengguna;

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Kaur Pemerintah') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_pengguna VALUES("1","Zainal A","admin","1","Administrator");
INSERT INTO tb_pengguna VALUES("2","Somat","kaur","1","Kaur Pemerintah");



DROP TABLE tb_pindah;

CREATE TABLE `tb_pindah` (
  `id_pindah` int(11) NOT NULL AUTO_INCREMENT,
  `id_pdd` int(11) NOT NULL,
  `tgl_pindah` date NOT NULL,
  `alasan` varchar(50) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  PRIMARY KEY (`id_pindah`),
  KEY `id_pdd` (`id_pdd`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tb_pindah VALUES("1","7","2020-09-20","Kerja","1");
INSERT INTO tb_pindah VALUES("2","2","2021-02-23","1","1");



DROP TABLE tb_supplier;

CREATE TABLE `tb_supplier` (
  `kode` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `alamat` text COLLATE utf8mb4_bin NOT NULL,
  `telpon` varchar(13) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `pic` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `bank` int(25) NOT NULL,
  `ket` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;




DROP TABLE termin;

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




