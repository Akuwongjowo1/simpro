<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_alat WHERE id_alat='".$_GET['kode']."'";
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
				<label class="col-sm-2 col-form-label">Kode alat</label>
				<div class="col-sm-6">
					<input name="kode" type="text" required class="form-control" id="alasan" placeholder="" value="<?php echo $data_cek['id_alat']; ?>" readonly/>
				</div>
			</div>

			
		
            
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Alat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="nama" placeholder=""value="<?php echo $data_cek['nama_alat']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="jenis" placeholder=""value="<?php echo $data_cek['jenis']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
				<label class="col-sm-2 col-form-label">Merk</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alamat_tujuan" name="merk" placeholder="" value="<?php echo $data_cek['merk']; ?>"
				</div>
			</div>
			</div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Sewa</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="harga" name="alamat" placeholder="" oninput="formatCurrency(this)" value="<?php echo $data_cek['harga']; ?>"
                </div>
            </div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-alat" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<script>
    function formatCurrency(input) {
        // Remove non-numeric characters
        const numericValue = input.value.replace(/[^0-9]/g, '');

        // Format with commas
        const formattedValue = new Intl.NumberFormat('id-ID').format(numericValue);

        // Update input value
        input.value = formattedValue;
    }
</script>

<?php

    if (isset ($_POST['Ubah'])){
		$harga = preg_replace('/[.,]/', '', $_POST['alamat']); // Remove dots and commas

        $sql_ubah = "UPDATE tb_alat SET 
		
		nama_alat='".$_POST['nama']."',
		jenis='".$_POST['jenis']."',
		merk='".$_POST['merk']."',
		harga= '$harga'

		
		WHERE id_alat='".$_POST['kode']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-alat-berat';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-alat-berat';
        }
      })</script>";
    }}
