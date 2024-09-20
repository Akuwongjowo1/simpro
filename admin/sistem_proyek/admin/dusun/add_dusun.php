<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Wilayah Dusun</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_dusun" name="nama_dusun" placeholder="Nama Dusun" required>
				</div>
			

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-dusun" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

        
$sql_simpan = "INSERT INTO tb_dusun (id_dusun,nama_dusun) VALUES ('','".$_POST['nama_dusun']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
		mysqli_close($koneksi);
		
		

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-dusun';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-dusun';
          }
      })</script>";
    
			}
     //selesai proses simpan data
