<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from hb WHERE kode='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Kode</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pindah" name="id_pindah" value="<?php echo $data_cek['kode']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nominal</label>
				<div class="col-sm-6">
					<input name="nama" type="text" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['nominal']; ?>">
				</div>
			</div>
             <div class="form-group row">
				<label class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-6">
					<input name="tgl" type="date" required class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['tgl']; ?>">
				</div>
			</div>
          <div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input name="ket2" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['ket']; ?>">
			  </div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-hb" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE hb SET 
		nominal='".$_POST['nama']."',
		tgl=	 '".$_POST['tgl']."',
			ket='".$_POST['ket2']."'
		WHERE kode='".$_POST['id_pindah']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-hb';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-hb';
        }
      })</script>";
    }}
