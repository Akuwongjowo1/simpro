<?php

    if(isset($_GET['kode'])){
        $sql_cek = "Select *  from 
		tb_kas WHERE kd_kas='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Kode Kas</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="kd_kas" name="kd_kas" value="<?php echo $data_cek['kd_kas']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori Anggaran</label>
				<div class="col-sm-4">
					<select name="nik" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Biaya Umum</option>
						<option selected="selected"><?php echo $data_cek['kategori']; ?></option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Anggaran</label>
				<div class="col-sm-6">
					<input name="nama_kas" type="text" required class="form-control" id="nama_kas" placeholder="" pattern="[A-Za-z ]+" value="<?php echo $data_cek['jenis']; ?>">
				</div>
			</div>

			
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-kas" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>
<?php
if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_kas SET 
		jenis='".$_POST['nama_kas']."',
		kategori='".$_POST['nik']."'
		
		WHERE kd_kas='".$_POST['kd_kas']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);


    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kas';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-kas';
        }
      })</script>";
    }}