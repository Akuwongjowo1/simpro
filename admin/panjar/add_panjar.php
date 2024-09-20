<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			

<div class="form-group row">
				<label class="col-sm-2 col-form-label">Proyek</label>
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
							
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>

			</div>
			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Panjar</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket1" placeholder="" required>
				</div>
			</div>

			 <div class="form-group row">
				<label class="col-sm-2 col-form-label">Sumber Panjar</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="sumber" placeholder="" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-panjar" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO panjar (kode_p,kproyek,panjar,sumber) VALUES (
			'".$_POST['']."',
            '".$_POST['kode']."',
			'".$_POST['ket1']."',
			
			'".$_POST['sumber']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-panjar';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-panjar';
          }
      })</script>";
    }}
     //selesai proses simpan data
