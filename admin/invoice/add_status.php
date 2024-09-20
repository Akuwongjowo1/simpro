<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			

<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Proyek</label>
				<div class="col-sm-6">
					<select name="kode" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Proyek -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from proyek";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['kode'] ?>">
							<?php echo $row['nama'] ?>
							-
							<?php echo $row['nilai'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>

			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Proyek</label>
				<div class="col-sm-3">
					<select name="kategori" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Pemesanan (PO)</option>
						<option>Pengiriman (DO)</option>
                        <option>BAST</option>
                        <option>Kirim invoice</option>
                        <option>Closing</option>
                        <option>Cancel</option>
                         <option>Pending</option>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-status" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO status (kode,kproyek,status) VALUES (
			'".$_POST['']."',
            '".$_POST['kode']."',
			
			
			'".$_POST['kategori']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-status';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-status';
          }
      })</script>";
    }}
     //selesai proses simpan data
