<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			
			
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan" name="kode" placeholder="" required>
				</div>
			</div>

			
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="nama" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="alamat" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Telpon</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="telpon" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">PIC</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="pic" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Rek BANK</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="bank" placeholder="" required>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Katerangan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="ket" placeholder="" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-developer" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO developer (kode,nama, alamat,telpon,	email,pic,bank,ket) VALUES (
			'".$_POST['kode']."',
            '".$_POST['nama']."',
		
			'".$_POST['alamat']."',
			'".$_POST['telpon']."',
			'".$_POST['email']."',
			'".$_POST['pic']."',
			'".$_POST['bank']."',
			'".$_POST['ket']."')";
		$query_simpan = mysqli_query($koneksi, $sql_simpan);
		
		
    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-developer';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-developer';
          }
      })</script>";
    }}
     //selesai proses simpan data
