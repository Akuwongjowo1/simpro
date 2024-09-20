<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
		
            
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Barang</label>
    <div class="col-sm-6">
        <select name="nama" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected">- Pilih Nama Barang -</option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM tb_barang";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['kd_barang'];
                $nama_barang = $row_barang['nama'];
            ?>
            <option value="<?php echo $kd_barang; ?>">
                <?php echo $nama_barang; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>

    
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Pcs</option>
                        <option>Unit</option>
                        <option>Box</option>
                        <option>Botol</option>
                        <option>Kotak</option>
						<option selected="selected">Pcs</option>
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah </label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="telpon" placeholder="" required>
				</div>
			</div>
           <div class="form-group row">
				<label class="col-sm-2 col-form-label">Sisa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tujuan" placeholder="" required>
				</div>
			</div>
				

            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="alamat_tujuan" name="tgl" placeholder="" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-inventaris" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO inventaris (kd_barang,satuan,jumlah,sisa,tgl) VALUES (
			
            
			'".$_POST['nama']."',
		
			'".$_POST['kategori']."',
			'".$_POST['telpon']."',
			'".$_POST['tujuan']."',
			'".$_POST['tgl']."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-inventaris';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-inventaris';
          }
      })</script>";
    }}
     //selesai proses simpan data
