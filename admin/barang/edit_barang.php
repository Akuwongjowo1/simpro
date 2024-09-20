<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from barang WHERE id_barang='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Kode Barang</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['id_barang']; ?>" readonly/>
				</div>
			</div>

			
		
            
<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Barang</label>
				<div class="col-sm-6">
					<input name="nama" type="text" class="form-control" id="alamat_tujuan" placeholder="" pattern="[A-Za-z ]+" value="<?php echo $data_cek['nama_barang']; ?>">
				</div>
	  </div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-6">
					<input name="alamat" type="text" class="form-control" id="alamat_tujuan" placeholder=""  pattern="[0-9]+" value="<?php echo $data_cek['harga_jual']; ?>">
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-4">
					<select name="kategori" id="level" class="form-control">
						<option selected="selected"><?php echo $data_cek['satuan_barang']; ?></option>
						<option>Pcs</option>
                        <option>Unit</option>
                        <option>Box</option>
                        <option>Botol</option>
                        <option>Kotak</option>
						
					</select>
				</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Stok</label>
				<div class="col-sm-6">
					<input name="telpon" type="text" required class="form-control" id="alamat_tujuan" placeholder="" pattern="[0-9]+" value="<?php echo $data_cek['stok']; ?>">
				</div>
			</div>
            
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-barang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE barang SET 
		
		nama_barang='".$_POST['nama']."',
		harga_jual='".$_POST['alamat']."',
		satuan_barang='".$_POST['kategori']."',
		stok='".$_POST['telpon']."'
		
		WHERE id_barang='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-barang';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-barang';
        }
      })</script>";
    }}
