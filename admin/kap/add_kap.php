<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Anggaran</label>
				<div class="col-sm-6">
					<select name="status" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Jenis Anggaran -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kas";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['jenis'] ?>">
							<?php echo $row['jenis'] ?>
							
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>

			</div>
			


	
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nominal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="nama" placeholder="" required>
				</div>
			</div>
            
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket2" placeholder="">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="ket3" placeholder="" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kap" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO anggaran (jenis,nominal,ket,tgl) VALUES (
			
           	'".$_POST['status']."',
			'".$_POST['nama']."',
			 '".$_POST['ket2']."',
			'".$_POST['ket3']."')";		
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);
		
    if ($query_simpan ) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kap';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kap';
          }
      })</script>";
    }}
     //selesai proses simpan data
