

<?php


// Panggil koneksi database.php untuk koneksi database
require_once "inc/koneksi.php";
if(isset($_GET['kode'])){
	
			// ambil data hasil submit dari form
			$id_pemesanan = $_GET['kode'];
			$status  = "Diterima";
       $status2  = "Pesanan Dari Pengawas Diterima Oleh Admin Lapangan";
			// perintah query untuk mengubah data pada tabel users
            $query = mysqli_query($koneksi, "UPDATE pemesanan SET status  = '$status',
                                                                  ket  = '$status2'
                                                          WHERE kd_pemesanan = '$id_pemesanan'")
                                            or die('Ada kesalahan pada query update status on : '.mysqli_error($mysqli));

            // cek query
           if ($query) {
        echo "<script>
      Swal.fire({title: 'Pemesanan Diterima',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lapangan';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Update Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lapangan';
        }
      })</script>";
    }}
	
?>