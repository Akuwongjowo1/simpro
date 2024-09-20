<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="nama" name="nama" placeholder="Nama Bayi" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text"  class="form-control" id="nik" name="nik" placeholder="NIK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text"  class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Lahir</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>Laki - Laki</option>
						<option>Perempuan</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluarga</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih KK -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_kk'] ?>">
							<?php echo $row['no_kk'] ?>
							-
							<?php echo $row['kepala'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>

			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ayah</label>
				<div class="col-sm-6">
					<input type="text"  class="form-control" id="nama_ayah" name="nama_ayah" placeholder="NAMA AYAH" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-6">
					<input type="text"  class="form-control" id="nama_ibu" name="nama_ibu" placeholder="NAMA IBU" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Surat Nikah</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_nikah" name="filenikah">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Kelahiran</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_lahir" name="filelahir">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KK</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_kk" name="filekk">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KTP</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ktp" name="filektp">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			<div class="card-footer">
				<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
				<a href="?page=data-lahir" title="Kembali" class="btn btn-secondary">Batal</a>
			</div>
	</form>
	</div>

	<?php
$koneksi = new mysqli ("localhost","root","","sistem_penduduk");
    if (isset ($_POST['Simpan'])){
		
		$nomor    = $_POST['filenikah'];
        $ekstensi_diperbolehkan    = array('jpg','png','jpeg','pdf');
        $nama    = $_FILES['filenikah']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['filenikah']['size'];
        $file_tmp    = $_FILES['filenikah']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'C:/xampp/htdocs/sistem_penduduk/admin/lahir/images/'.$nama);
		
		$nomors    = $_POST['filelahir'];
        $ekstensi_diperbolehkans    = array('jpg','png','jpeg','pdf');
        $namas    = $_FILES['filelahir']['name'];
        $xs        = explode('.', $namas);
        $ekstensis    = strtolower(end($xs));
        $ukurans        = $_FILES['filelahir']['size'];
        $file_tmps    = $_FILES['filelahir']['tmp_name']; 
     
        if(in_array($ekstensis, $ekstensi_diperbolehkans) === true){
        move_uploaded_file($file_tmps, 'C:/xampp/htdocs/sistem_penduduk/admin/lahir/images/'.$namas);
		
		$nomorss    = $_POST['filekk'];
        $ekstensi_diperbolehkanss    = array('jpg','png','jpeg','pdf');
        $namass    = $_FILES['filekk']['name'];
        $xss        = explode('.', $namass);
        $ekstensiss    = strtolower(end($xss));
        $ukuranss       = $_FILES['filekk']['size'];
        $file_tmpss    = $_FILES['filekk']['tmp_name']; 
     
        if(in_array($ekstensiss, $ekstensi_diperbolehkanss) === true){
        move_uploaded_file($file_tmpss, 'C:/xampp/htdocs/sistem_penduduk/admin/lahir/images/'.$namass);
		
		$nomorsss    = $_POST['filektp'];
        $ekstensi_diperbolehkansss    = array('jpg','png','jpeg','pdf');
        $namasss    = $_FILES['filektp']['name'];
        $xsss        = explode('.', $namasss);
        $ekstensisss    = strtolower(end($xsss));
        $ukuransss       = $_FILES['filektp']['size'];
        $file_tmpsss    = $_FILES['filektp']['tmp_name']; 
     
        if(in_array($ekstensisss, $ekstensi_diperbolehkansss) === true){
        move_uploaded_file($file_tmpsss, 'C:/xampp/htdocs/sistem_penduduk/admin/lahir/images/'.$namasss);
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_lahir (nama, tempat_lh, tgl_lh, jekel, id_kk,nik, nama_ayah, nama_ibu,file_nikah,file_lahir,file_kk,file_ktp) VALUES (
            '".$_POST['nama']."',
			'".$_POST['tempat_lh']."',
			'".$_POST['tgl_lh']."',
            '".$_POST['jekel']."',
			'".$_POST['id_kk']."',
			'".$_POST['nik']."',
			'".$_POST['nama_ayah']."',
			'".$_POST['nama_ibu']."',
			'$nama',
			'$namas',
			'$namass',
			'$namasss')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		$sql_simpans = "INSERT INTO tb_pdd(nama, tempat_lh, tgl_lh,jekel,nik) VALUES (	
		    '".$_POST['nama']."',
			'".$_POST['tempat_lh']."',
			'".$_POST['tgl_lh']."',	
			'".$_POST['jekel']."',
			'".$_POST['nik']."')";
		$query_simpans = mysqli_query($koneksi, $sql_simpans);

        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-lahir';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-lahir';
          }
      })</script>";
    }}}}}}
     //selesai proses simpan data
