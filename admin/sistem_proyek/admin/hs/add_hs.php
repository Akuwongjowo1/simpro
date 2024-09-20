<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Supplier</label>
				<div class="col-sm-6">
					<select name="kode" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Supplier -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_supplier";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['kode'] ?>">
							<?php echo $row['nama'] ?>
							-
							<?php echo $row['alamat'] ?>
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
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" required>
				</div>
			</div>
          <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket2" placeholder="">
			  </div>
			</div>
           
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-hs" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO hs (kode_hs,ksupplier,nominal,tgl,keterangan) VALUES (
			'".$_POST['']."',
           '".$_POST['kode']."',
			 '".$_POST['nama']."',
			 '".$_POST['tgl']."',
			'".$_POST['ket2']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-hs';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-hs';
          }
      })</script>";
    }}
     //selesai proses simpan data
