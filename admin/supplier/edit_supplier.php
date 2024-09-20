<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_supplier WHERE kode='".$_GET['kode']."'";
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
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['kode']; ?>" readonly>
				</div>
			</div>

			
		
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option>- Pilih -</option>
						<option>Barang</option>
						<option selected="selected"><?php echo $data_cek['kategori']; ?></option>
					</select>
				</div>
			</div>
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input name="nama" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[A-Za-z ]+" value="<?php echo $data_cek['nama']; ?>">
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
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-6">
					<input name="email" type="text" class="form-control" id="email" placeholder="" value="<?php echo $data_cek['email']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">PIC</label>
				<div class="col-sm-6">
					<input name="pic" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['pic']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Rek BANK</label>
				<div class="col-sm-6">
					<input name="bank" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['bank']; ?>">
				</div>
			</div>
          <div class="form-group row">
				<label class="col-sm-2 col-form-label">Katerangan</label>
				<div class="col-sm-6">
					<input name="ket" type="text" class="form-control" id="alamat_tujuan" placeholder="" value="<?php echo $data_cek['ket']; ?>">
			  </div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-supplier" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_supplier SET 
		kategori='".$_POST['kategori']."',
		nama='".$_POST['nama']."',
		alamat='".$_POST['alamat']."',
		telpon='".$_POST['telpon']."',
		email='".$_POST['email']."',
		pic='".$_POST['pic']."',
		bank='".$_POST['bank']."',
		ket='".$_POST['ket']."'
		WHERE kode='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-supplier';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-supplier';
        }
      })</script>";
    }}
