<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_lahir WHERE id_lahir='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_lahir" name="id_lahir" value="<?php echo $data_cek['id_lahir']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					 required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_cek['nik']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tgl Lahir</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					 required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "Laki - Laki") echo "<option value='Laki - Laki' selected>Laki - Laki</option>";
                else echo "<option value='Laki - Laki'>Laki - Laki</option>";

                if ($data_cek['jekel'] == "Perempuan") echo "<option value='Perempuan' selected>Perempuan</option>";
                else echo "<option value='Perempuan'>Perempuan</option>";
            ?>
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ayah</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?php echo $data_cek['nama_ayah']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Ibu</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $data_cek['nama_ibu']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluarga</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="">- Pilih -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_kk'] ?>" <?=$data_cek[
						 'id_kk']==$row[ 'id_kk'] ? "selected" : null ?>>
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
				<label class="col-sm-2 col-form-label">File Surat Nikah</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_nikah" name="filenikah" value="<?php echo $data_cek['file_surat_nikah']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Surat Kelahiran</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_lahir" name="filelahir" value="<?php echo $data_cek['file_kelahiran']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KK</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_kk" name="filekk" value="<?php echo $data_cek['file_kk']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File KTP</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_ktp" name="filektp" value="<?php echo $data_cek['file_ktp']; ?>"
					/>
				</div>
			</div>

			

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-lahir" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
		#$nomor    = $_POST['filenikah'];
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
		
    $sql_ubah = "UPDATE tb_lahir SET 
		nama='".$_POST['nama']."',
		tempat_lh='".$_POST['tempat_lh']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		id_kk='".$_POST['id_kk']."',
		nik='".$_POST['nik']."',
		nama_ayah='".$_POST['nama_ayah']."',
		nama_ibu='".$_POST['nama_ibu']."',
		file_nikah='$nama',
		file_lahir='$namas',
		file_kk='$namass',
		file_ktp='$namasss'
		
		WHERE id_lahir='".$_POST['id_lahir']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-lahir';
        }
      })</script>";
    }}}}}}
