<?php
if(isset($_GET['kode']) && isset($_GET['kd_barang'])){
    $kd_pemesanan = $_GET['kode'];
    $kd_barang = $_GET['kd_barang'];

    // Perform input validation or use prepared statements to prevent SQL injection

    $sql_hapus = "DELETE FROM pemesanan WHERE kd_pemesanan='$kd_pemesanan' AND kd_barang='$kd_barang' AND pengawas='Pengawas'";
    $query_hapus = mysqli_query($koneksi, $sql_hapus);

    if ($query_hapus) {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pemesanan-pengawas2';
                }
            })</script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Hapus Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-pemesanan-pengawas2';
                }
            })</script>";
    }
}
?>
