<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori Anggaran</label>
				<div class="col-sm-4">
					<select name="nik" id="level" class="form-control">			
						<option>Biaya Umum</option>
						<option selected="selected">Biaya Lainnya</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Anggaran</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="nama_kas" name="nama_kas" placeholder="" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kas" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset ($_POST['Simpan'])){
        $sql_simpan = "INSERT INTO tb_kas (kategori, jenis) VALUES (
			'".$_POST['nik']."',
			'".$_POST['nama_kas']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		$sql_simpan1 = "INSERT INTO laba (kode) VALUES (		
			'".$_POST['nama_kas']."')";
		$query_simpan1 = mysqli_query($koneksi, $sql_simpan1);
       
		
        mysqli_close($koneksi);
		

    if ($query_simpan && $query_simpan1) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kas';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kas';
          }
      })</script>";
    }
}
     //selesai proses simpan data
