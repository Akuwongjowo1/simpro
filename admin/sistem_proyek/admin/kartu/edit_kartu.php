<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kk WHERE id_kk='".$_GET['kode']."'";
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
				<div class="col-sm-3">
					<input type='text' class="form-control" id="id_kk" name="id_kk" value="<?php echo $data_cek['id_kk']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No KK</label>
				<div class="col-sm-6">
					<input type="text" pattern="[0-9]+" class="form-control" id="no_kk" name="no_kk" value="<?php echo $data_cek['no_kk']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kpl Keluarga</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kepala" name="kepala" value="<?php echo $data_cek['kepala']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Desa</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="desa" name="desa" value="<?php echo $data_cek['desa']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" pattern="[0-9]+" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
					 required>
				</div>
				<div class="col-sm-3">
					<input type="text" pattern="[0-9]+" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kec" name="kec" value="<?php echo $data_cek['kec']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kabupaten</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="kab" name="kab" value="<?php echo $data_cek['kab']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" pattern="[A-Za-z ]+" class="form-control" id="prov" name="prov" value="<?php echo $data_cek['prov']; ?>"
					 required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Nikah</label>
				<div class="col-sm-6">
					<input type="file" class="form-control" id="file_nikah" name="filenikah" value="<?php echo $data_cek['file_nikah']; ?>"
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
			<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>



<?php

    if (isset ($_POST['Ubah'])){
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
		
    $sql_ubah = "UPDATE tb_kk SET 
    no_kk='".$_POST['no_kk']."',
    kepala='".$_POST['kepala']."',
    desa='".$_POST['desa']."',
    rt='".$_POST['rt']."',
    rw='".$_POST['rw']."',
    kec='".$_POST['kec']."',
    kab='".$_POST['kab']."',
	prov='".$_POST['prov']."',
	file_nikah='$nama',
    file_ktp='$namas'
    WHERE id_kk='".$_POST['id_kk']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kartu';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kartu';
        }
      })</script>";
    }}
		}}