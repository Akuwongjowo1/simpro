<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_absen WHERE kd_absen='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			 <div class="form-group row">
				
				<div class="col-sm-6">
					<input name="kode" type="hidden" required class="form-control" id="alasan" placeholder="" value="<?php echo 
					$data_cek['kd_absen']; ?>">
				</div>
			</div>

			
		
            
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Karyawan</label>
    <div class="col-sm-6">
        <select name="nama" id="id_barang" class="form-control select2bs4" required>
            <?php
            // Ambil data dari tabel tb_absen
            $query_barang = "SELECT * FROM tb_karyawan";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                $kd_barang = $row_barang['kode'];
                $nama_barang = $row_barang['nama'];
                
                // Check if the current item is the one being edited
                $selected = ($kd_barang == $data_cek['kd_karyawan']) ? 'selected' : '';

                echo "<option value=\"$kd_barang\" $selected>$nama_barang</option>";
            }
            ?>
        </select>
    </div>
</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option selected="selected"><?php echo $data_cek['status']; ?></option>
						<option>- Pilih -</option>
						<option>Masuk</option>
                        <option>Tidak Masuk</option>
                        <option>Izin</option>
                       
					</select>
				
			</div>
            
		</div>
		 
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-absen" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_absen SET 
		kd_karyawan='".$_POST['nama']."',
		status='".$_POST['kategori']."'
		
		WHERE kd_absen='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-absen';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-absen';
        }
      })</script>";
    }}
