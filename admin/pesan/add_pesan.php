<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Kirim Pesan</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Tujuan</label>
    <div class="col-sm-6">
        <select name="nama" id="id_barang" class="form-control select2bs4" required>
            <option selected="selected"></option>
            <?php
            // Ambil data dari tabel tb_barang
            $query_barang = "SELECT * FROM tb_pengguna";
            $hasil_barang = mysqli_query($koneksi, $query_barang);

            while ($row_barang = mysqli_fetch_array($hasil_barang)) {
                // Ganti 'kd_barang' dan 'nama' sesuai dengan struktur tabel tb_barang
                $kd_barang = $row_barang['id_pengguna'];
                $nama_barang = $row_barang['nama_pengguna'];
                $jabatan = $row_barang['level'];
            ?>
            <option value="<?php echo $kd_barang; ?>">
                <?php echo $nama_barang; ?> - <?php echo $jabatan; ?>
            </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Perihal</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kepala" name="kepala" placeholder="" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pesan</label>
				<div class="col-sm-6">
				  <textarea name="ket2" id="ket2"></textarea>
				</div>
			</div>

		

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_buku_nikah" name="filenikah">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-pesan-masuk" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

  if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
    $username = $_SESSION["ses_id"];
    $jenis= 'Masuk';
    $date = date("Y-m-d"); // Current date
    $time = date("H:i:s"); // Current time
    
    
    // Generate a unique filename (e.g., timestamp)
    $imageFileName = 'pesan_'.time().'.png';  // You can use a different format if needed
   
   // Path to the 'images' folder
    $imageFolderPath = './images/';  // Update with your folder path


    // Move the uploaded image file to the 'images' folder
    move_uploaded_file($_FILES['filenikah']['tmp_name'], $imageFolderPath . $imageFileName);

   // Check if an image file is uploaded
    if (isset($_FILES['filenikah']) && $_FILES['filenikah']['error'] === UPLOAD_ERR_OK) {

        $sql_simpan = "INSERT INTO tb_pesan (tujuan,perihal,isi,id_user,file) VALUES (
			
            
			'".$_POST['nama']."',
		
			'".$_POST['kepala']."',
			'".$_POST['ket2']."',
			'".$username."',
			'".$imageFileName."')";
			
			
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		}
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-pesan-masuk';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-pesan-masuk';
          }
      })</script>";
    }}