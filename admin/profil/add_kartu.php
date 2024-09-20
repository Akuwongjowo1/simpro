<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No KK</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="no_kk" name="no_kk" placeholder="No KK" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kpl Keluarga</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kepala" name="kepala" placeholder="Kpl Keluarga" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="desa" name="desa" placeholder="Desa" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" pattern="[0-9]+" class="form-control" id="rt" name="rt" placeholder="RT" required>
				</div>
				<div class="col-sm-3">
					<input type="text" pattern="[0-9]+" class="form-control" id="rw" name="rw" placeholder="RW" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kec" name="kec" placeholder="Kecamatan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kabupaten</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kab" name="kab" placeholder="Kabupaten" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="prov" name="prov" placeholder="Provinsi" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Nikah</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_buku_nikah" name="filenikah"  required="required">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KTP</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ktp" name="filektp"  required="required">
					<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .pdf</p>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
	    $nomor    = $_POST['filenikah'];
        $ekstensi_diperbolehkan    = array('jpg','png','jpeg','pdf');
        $nama    = $_FILES['filenikah']['name'];
        $x        = explode('.', $nama);
        $ekstensi    = strtolower(end($x));
        $ukuran        = $_FILES['filenikah']['size'];
        $file_tmp    = $_FILES['filenikah']['tmp_name']; 
     
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        move_uploaded_file($file_tmp, 'C:/xampp/htdocs/sistem_penduduk/admin/kartu/images/'.$nama);
		
		$nomors    = $_POST['filektp'];
        $ekstensi_diperbolehkans    = array('jpg','png','jpeg','pdf');
        $namas    = $_FILES['filektp']['name'];
        $xs        = explode('.', $namas);
        $ekstensis    = strtolower(end($xs));
        $ukurans        = $_FILES['filektp']['size'];
        $file_tmps    = $_FILES['filektp']['tmp_name']; 
     
        if(in_array($ekstensis, $ekstensi_diperbolehkans) === true){
        move_uploaded_file($file_tmps, 'C:/xampp/htdocs/sistem_penduduk/admin/kartu/images/'.$namas);
		
        $sql_simpan = "INSERT INTO tb_kk (no_kk, kepala, desa, rt, rw, kec, kab, prov,file_nikah,file_ktp) VALUES (
            '".$_POST['no_kk']."',
            '".$_POST['kepala']."',
            '".$_POST['desa']."',
            '".$_POST['rt']."',
            '".$_POST['rw']."',
            '".$_POST['kec']."',
            '".$_POST['kab']."',
			 '".$_POST['prov']."',
			  '$nama',
            '$namas')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kartu';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kartu';
          }
      })</script>";
    }}}}
     //selesai proses simpan data
