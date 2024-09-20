<?php
// Include database connection file

$server   = "localhost";
$username = "root";
$password = "";
$database = "db_proyek";

// koneksi database
$mysqli = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
session_start();
// memasukkan data ke array
$pemohon = $_SESSION["ses_level"];
$nama    = $_POST['no'];
$jk      = $_POST['nama'];
$alamat  = $_POST['jumlah'];
$satuan = $_POST['satuan'];
$status = "Waiting";
// menghitung total data
$total = count($nama);

// melakukan perulangan input
for ($i = 0; $i < $total; $i++) {
    mysqli_query($mysqli, "INSERT INTO pemesanan SET
        kd_pemesanan     = '$nama[$i]',
        kd_barang   = '$jk[$i]',
        jumlah = '$alamat[$i]',
         satuan= '$satuan[$i]',
         pengawas= '$pemohon',
        status= '$status'
    ");
}

//kembali ke halaman sebelumnya
    header("location: ../../index.php?page=data-pemesanan-pengawas2");
?>
