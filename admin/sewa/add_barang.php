<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

        <div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Penyewa</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="tujuan" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">No Telpon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="telpon" placeholder="" required>
				</div>
			</div>			
		
            
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Nama Alat</label>
    <div class="col-sm-6">
        <select name="nama" id="id_alat" class="form-control select2bs4" required>
            <option selected="selected">- Pilih Alat -</option>
            <?php
            // Ambil data dari tabel tb_alat
            $query_alat = "SELECT * FROM tb_alat";
            $hasil_alat = mysqli_query($koneksi, $query_alat);

            while ($row_alat = mysqli_fetch_array($hasil_alat)) {
                // Ganti 'kd_alat' dan 'nama' sesuai dengan struktur tabel tb_alat
                $kd_alat = $row_alat['id_alat'];
                $nama_alat = $row_alat['nama_alat'];
                $jenis = $row_alat['jenis'];
                $merk = $row_alat['merk'];
            ?>
            <option value="<?php echo $kd_alat; ?>">
                <?php echo $nama_alat; ?> - <?php echo $jenis; ?> - <?php echo $merk; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="alamat_tujuan" name="jumlah" placeholder="">
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
			<a href="?page=data-sewa" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO sewa (id_alat,jumlah,nama,telpon,tgl) VALUES (
			
            
			'".$_POST['nama']."',
		
			'".$_POST['jumlah']."',
			'".$_POST['tujuan']."',
			'".$_POST['telpon']."',
			'".$_POST['tgl']."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-sewa';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-sewa';
          }
      })</script>";
    }}
     //selesai proses simpan data
