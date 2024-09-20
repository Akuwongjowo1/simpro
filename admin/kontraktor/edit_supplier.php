<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_kontraktor WHERE kode='".$_GET['kode']."'";
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
				
				<div class="col-sm-6">
					<input name="kode" type="hidden" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['kode']; ?>" readonly>
				</div>
			</div>

			
		
           
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kontraktor</label>
				<div class="col-sm-6">
					<input name="nama" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[A-Za-z ]+" value="<?php echo $data_cek['nama_kontraktor']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input name="alamat" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['alamat']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Telpon</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['telpon']; ?>">
				</div>
			</div>
           
          
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kontraktor" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_kontraktor SET 
		
		nama_kontraktor='".$_POST['nama']."',
		alamat='".$_POST['alamat']."',
		telpon='".$_POST['telpon']."'
		WHERE kode='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kontraktor';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kontraktor';
        }
      })</script>";
    }}
