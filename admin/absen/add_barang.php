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
        <select name="proyek" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected"></option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM proyek";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['kode'];
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
    <label class="col-sm-2 col-form-label">Progress</label>
    <div class="col-sm-6">
        <select name="pekerjaan" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected"></option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM pekerjaan";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['kode_p'];
                $nama_barang = $row_barang['ket'];
            
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
    <label class="col-sm-2 col-form-label">Nama Karyawan</label>
    <div class="col-sm-6">
        <select name="nama" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected"></option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM tb_karyawan";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['kode'];
                $nama_barang = $row_barang['nama_karyawan'];
                $jabatan = $row_barang['jabatan'];
            ?>
            <option value="<?php echo $kd_barang; ?>">
                <?php echo $nama_barang; ?> - <?php echo $kd_barang; ?> - <?php echo $jabatan; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>

    
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						
						<option>Istirahat</option>
                        <option>Pulang</option>
                        <option>Tidak Masuk</option>
                        <option>Izin</option>
                       

						<option selected="selected">Masuk</option>
					</select>
				</div>
			</div>
            
</div>
			
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-absen" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_absen(kode_p,kd_pekerjaan,kd_karyawan,status) VALUES (
			
            
            '".$_POST['proyek']."',

            '".$_POST['pekerjaan']."',
			'".$_POST['nama']."',
		
			'".$_POST['kategori']."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-absen';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-absen';
          }
      })</script>";
    }}
     //selesai proses simpan data
